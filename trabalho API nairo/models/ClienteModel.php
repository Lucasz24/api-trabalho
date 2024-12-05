<?php
    require_once 'DAL/ClienteDAO.php';

    class ClienteModel {
        public ?int $idCliente;
        public ?int $idTipoCliente;
        public ?string $nomeCliente;
        public ?string $emailCliente;
        public ?string $senhaCliente;

        public function __construct(
            ?int $idCliente = null,
            ?int $idTipoCliente = null,
            ?string $nomeCliente = null,
            ?string $emailCliente = null,
            ?string $senhaCliente = null
        ) {
            $this->idCliente = $idCliente;
            $this->idTipoCliente = $idTipoCliente;
            $this->nomeCliente = $nomeCliente;
            $this->emailCliente = $emailCliente;
            $this->senhaCliente = $senhaCliente;
        }

        public function getClientes() {
            $ClienteDAO = new ClienteDAO();

            $Clientes = $ClienteDAO->getClientes();

            foreach ($Clientes as &$Cliente) {
                $Cliente = new ClienteModel(
                    $Cliente['idCliente'],
                    $Cliente['idTipoCliente'],
                    $Cliente['nomeCliente'],
                    $Cliente['emailCliente'],
                    $Cliente['senhaCliente']
                );
            }

            return $Clientes;
        }

        public function create() {
            $ClienteDAO = new ClienteDAO();

            return $ClienteDAO->createCliente($this);
        }

        public function update() {
            $ClienteDAO = new ClienteDAO();

            return $ClienteDAO->updateCliente($this);
        }

        public function delete() {
            $ClienteDAO = new ClienteDAO();

            return $ClienteDAO->deleteCliente($this);
        }

        public function getCliente($idCliente) {
            $ClienteDAO = new ClienteDAO;

            $Cliente = $ClienteDAO->getCliente($idCliente);

            $cliente = new ClienteModel(
                $cliente['idTipoCliente'],
                $cliente['nomeCliente'],
                $cliente['sobrenomeCliente'],
                $cliente['emailCliente'],
                $cliente['telefoneCliente'],
                $cliente['enderecoCliente'],
                $cliente['cidadeCliente'],
                $cliente['estadoCliente'],
                $cliente['cepCliente']
            );


            return $Cliente;
        }

        public function getClienteByEmail($email) {
            $ClienteDAO = new ClienteDAO();

            return $ClienteDAO->getClienteByEmail($email);
        }

        public function getClienteByEmailAndSenha($email, $senha) {
            $ClienteDAO = new ClienteDAO();

            return $ClienteDAO->getClienteByEmailAndSenha($email, $senha);
        }
    }
?>