<?php

namespace LinearApi\Api;

use GuzzleHttp\Client;
use LinearApi\AuthMethod;
use XAKEPEHOK\ArrayGraphQL\ArrayGraphQL;

class Base
{
    protected $client;
    protected $defines = [];

    public function __construct($config)
    {
        if (!$this->defines || !is_array($this->defines) || count($this->defines) < 2) {
            throw new \Exception('Missing defines');
        }

        if (!$this->default_nodes() || !is_array($this->default_nodes())) {
            throw new \Exception('Missing default nodes');
        }

        $this->client = new Client([
            'base_uri' => $config::API_URL,
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => $config->get_auth_method() == AuthMethod::OAUTH2 ?
                    'Bearer ' . $config->get_access() :
                    $config->get_access(),
            ],
        ]);
    }

    protected function default_nodes()
    {
        return [];
    }

    public function list($nodes, $args = [])
    {

        if (!$nodes || !is_array($nodes)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $nodes when calling '
            );
        }

        $nodes = ArrayGraphQL::convert($nodes);
        $args = json_encode($args);
        $args = preg_replace('/"([^"]+)"\s*:\s*/', '$1:', $args);

        // remove first and last curly brackets
        $args = substr($args, 1, -1);

        if ($args) {
            $args = '(' . $args . ')';
        }

        $response = $this->client->post('', [
            'body' => json_encode([
                'query' => '
                    query {
                        ' . $this->defines['list'] . ' ' . $args . ' {
                            nodes ' . $nodes . '
                        }
                    }
                ',
            ]),
        ]);

        return $response->getBody()->getContents();
    }

    public function get($id, $nodes)
    {

        if (!$id || !is_string($id)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling '
            );
        }

        if (!$nodes || !is_array($nodes)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $nodes when calling '
            );
        }

        $nodes = ArrayGraphQL::convert($nodes);

        $response = $this->client->post('', [
            'body' => json_encode([
                'query' => '
                    query {
                        ' . $this->defines['get'] . '(id: "' . $id . '") ' . $nodes . '
                    }
                ',
            ]),
        ]);

        return $response->getBody()->getContents();
    }

    public function mutation_string($type = 'create', $nodes)
    {
        $defines = $this->defines;
        $type_defines = $defines[$type];
        $variables = isset($type_defines['variables']) ? $type_defines['variables'] : [];

        if (!$variables || !is_array($variables)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $variables when calling '
            );
        }

        $mutation = 'mutation(';

        foreach ($variables as $key => $variable) {
            $mutation .= "$$key: $variable, ";
        }

        $mutation = substr($mutation, 0, -2);

        $mutation .= ') {';

        $mutation .= $type_defines['mutation'] . '(';

        foreach ($variables as $key => $variable) {
            $mutation .= "$key: $$key, ";
        }

        $mutation = substr($mutation, 0, -2);

        $mutation .= ') {';

        $mutation .= $defines['get'] . ' ' . $nodes;

        $mutation .= '}}';



        return $mutation;
    }

    public function create($payload, $nodes = [])
    {

        if (!$payload || !is_array($payload)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payload when calling '
            );
        }

        if ($nodes && !is_array($nodes)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $nodes when calling '
            );
        }

        if (!$nodes) {
            $nodes = $this->default_nodes();
        }

        if (!isset($payload['input'])) {
            $payload['input'] = $payload;
        }

        $nodes = ArrayGraphQL::convert($nodes);
        $response = $this->client->post('', [
            'body' => json_encode([
                'query' => '
                   ' . $this->mutation_string('create', $nodes) . '
                ',
                'variables' => $payload
            ]),
        ]);

        return $response->getBody()->getContents();
    }

    public function update($id, $payload, $nodes = [])
    {

        if (!$id || !is_string($id)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling '
            );
        }

        if (!$payload || !is_array($payload)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payload when calling '
            );
        }

        if ($nodes && !is_array($nodes)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $nodes when calling '
            );
        }

        if (!$nodes) {
            $nodes = $this->default_nodes();
        }

        if (!isset($payload['input'])) {
            $payload['input'] = $payload;
        }

        $payload['id'] = $id;

        $nodes = ArrayGraphQL::convert($nodes);
        $response = $this->client->post('', [
            'body' => json_encode([
                'query' => '
                   ' . $this->mutation_string('update', $nodes) . '
                ',
                'variables' => $payload
            ]),
        ]);

        return $response->getBody()->getContents();
    }

    public function delete($id)
    {

        if (!$id || !is_string($id)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling '
            );
        }

        if (!isset($this->defines['delete']) || !$this->defines['delete']) {
            throw new \InvalidArgumentException(
                'This api does not support delete'
            );
        }

        $response = $this->client->post('', [
            'body' => json_encode([
                'query' => '
                    mutation($id: String!){
                        ' . $this->defines['delete'] . '(id: $id) {
                            success
                        }
                    }
                ',
                'variables' => [
                    'id' => $id,
                ],
            ]),
        ]);

        return $response->getBody()->getContents();
    }
}
