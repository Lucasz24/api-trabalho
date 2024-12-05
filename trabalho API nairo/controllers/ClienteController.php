<?php
    require_once './models/ClienteModel.php';

    class ClientesController {
        public function getClientes() {
            $clienteModel = new ClienteModel();

            $clientes = $clienteModel->getClientes();

            return json_encode([
                'error' => null,
                'result' => $clientes
            ]);
        }

        public function createCliente() {
            $dados = json_decode(file_get_contents('php://input'), true);

            if (empty($dados['idTipoCliente']))
                return $this->mostrarErro('Você deve informar o idTipoCliente!');

            if (empty($dados['nomeCliente']))
                return $this->mostrarErro('Você deve informar o nomeCliente!');

            if (empty($dados['sobrenomeCliente']))
                return $this->mostrarErro('Você deve informar o sobrenomeCliente!');

            if (empty($dados['emailCliente']))
                return $this->mostrarErro('Você deve informar o emailCliente!');

            if (empty($dados['telefoneCliente']))
                return $this->mostrarErro('Você deve informar o telefoneCliente!');

            if (empty($dados['enderecoCliente']))
                return $this->mostrarErro('Você deve informar o enderecoCliente!');

            if (empty($dados['cidadeCliente']))
                return $this->mostrarErro('Você deve informar o cidadeCliente!');

            if (empty($dados['estadoCliente']))
                return $this->mostrarErro('Você deve informar o estadoCliente!');

            if (empty($dados['cepCliente']))
                return $this->mostrarErro('Você deve informar o cepCliente!');
        
            $cliente = new ClienteModel(
                null,
                $dados['idTipoCliente'],
                $dados['nomeCliente'],
                $dados['sobrenomeCliente'],
                $dados['emailCliente'],
                $dados['telefoneCliente'],
                $dados['enderecoCliente'],
                $dados['cidadeCliente'],
                $dados['estadoCliente'],
                $dados['cepCliente']
            );

            $cliente->create();

            return json_encode([
                'error' => null,
                'result' => true
            ]);
        }

        public function createCliente() {
            $dados = json_decode(file_get_contents('php://input'), true);

            if (empty($dados['idTipoCliente']))
                return $this->mostrarErro('Você deve informar o idTipoCliente!');

            if (empty($dados['nomeCliente']))
                return $this->mostrarErro('Você deve informar o nomeCliente!');

            if (empty($dados['sobrenomeCliente']))
                return $this->mostrarErro('Você deve informar o sobrenomeCliente!');

            if (empty($dados['emailCliente']))
                return $this->mostrarErro('Você deve informar o emailCliente!');

            if (empty($dados['telefoneCliente']))
                return $this->mostrarErro('Você deve informar o telefoneCliente!');

            if (empty($dados['enderecoCliente']))
                return $this->mostrarErro('Você deve informar o enderecoCliente!');

            if (empty($dados['cidadeCliente']))
                return $this->mostrarErro('Você deve informar o cidadeCliente!');

            if (empty($dados['estadoCliente']))
                return $this->mostrarErro('Você deve informar o estadoCliente!');

            if (empty($dados['cepCliente']))
                return $this->mostrarErro('Você deve informar o cepCliente!');
        
                $cliente = new ClienteModel(
                    null,
                    $dados['idTipoCliente'],
                    $dados['nomeCliente'],
                    $dados['sobrenomeCliente'],
                    $dados['emailCliente'],
                    $dados['telefoneCliente'],
                    $dados['enderecoCliente'],
                    $dados['cidadeCliente'],
                    $dados['estadoCliente'],
                    $dados['cepCliente']
                );
    

            $cliente->update();

            return json_encode([
                'error' => null,
                'result' => true
            ]);
        }

        public function deleteCliente() {
            $dados = json_decode(file_get_contents('php://input'), true);

            if (empty($dados['idCliente']))
                return $this->mostrarErro('Você deve informar o idCliente');

            $cliente = new ClienteModel($dados['idCliente']);

            $cliente->delete();

            return json_encode([
                'error' => null,
                'result' => true
            ]);
        }

        public function getCliente() {
            $dados = json_decode(file_get_contents('php://input'), true);

            if (empty($dados['idCliente']))
                return $this->mostrarErro('Você deve informar o idCliente!');

            $response = (new ClienteModel())->getCliente($dados['idCliente']);

            return json_encode([
                'error' => null,
                'result' => $response
            ]);
        }

        public function validateEmail() {
            $dados = json_decode(file_get_contents('php://input'), true);

            if (empty($dados['email']))
                return $this->mostrarErro('Você deve informar o email!');

            $cliente = (new ClienteModel())->getClienteByEmail($dados['email']);

            $response = empty($cliente) ? true : false;

            return json_encode([
                'error' => null,
                'result' => $response
            ]);
        }

        public function validateCliente() {
            $dados = json_decode(file_get_contents('php://input'), true);

            if (empty($dados['email']))
                return $this->mostrarErro('Você deve informar o email!');

            if (empty($dados['senha']))
                return $this->mostrarErro('Você deve informar a senha!');

            $cliente = (new ClienteModel())->getClienteByEmailAndSenha($dados['email'], md5($dados['senha']));

            $response = empty($cliente) ? false : true;

            return json_encode([
                'error' => null,
                'result' => $response
            ]);
        }

        private function mostrarErro(string $mensagem) {
            return json_encode([
                'error' => $mensagem,
                'result' => null
            ]);
        }
    }
?>
