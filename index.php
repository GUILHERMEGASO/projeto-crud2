<?php require 'header.php';
require 'classes/clientes.class.php';
$clientes = new clientes();
$dados = $clientes->getClientes();
$qt = count($dados);
?>
<title>Home</title>
<div class="container h-100 d-flex flex-column">
    <h3 class="mb-4"><?php echo "Total de ".$qt." clientes cadastrados" ?></h3>

    <div id="overflow">
        <table class="tabela table table table-hover table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th class="telefone">Telefone</th>
                    <th>Endereço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($dados as $cliente): ?>
                    <tr>
                        <td><?php echo $cliente['nome'] ?></td>
                        <td><?php echo $cliente['email'] ?></td>
                        <td><?php echo $cliente['cpf'] ?></td>
                        <td class="telefone"><?php echo $cliente['telefone'] ?></td>
                        <td class="p-2"><?php $endereco = unserialize($cliente['endereco']);
                            echo $endereco['municipio']." - ".$endereco['estado'] ?><br>
                            <buttom id="<?php echo $cliente['id'] ?>" type="button" class="btn btn-sm btn-link ver-endereco" data-bs-toggle="modal" data-bs-target="#modal">Ver endereço.</buttom>
                        </td>
                        <td class="d-flex flex-column p-1">
                            <a class="btn btn-sm btn-info mb-1" href="editar.php?id=<?php echo $cliente['id'] ?>">Editar</a>
                            <a class="btn btn-sm btn-danger" href="excluir.php?id=<?php echo $cliente['id'] ?>">Excluir</a>
                        </td>
                        <div class="modal fade" id="modal" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title fs-5" id="exampleModalLabel">Endereço</h3>
                                        <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body d-flex flex-column">
                                        <div class="mb-2 d-flex justify-content-around">
                                            <div>Estado: <?php echo $endereco['estado'] ?></div>
                                            <div>Município: <?php echo $endereco['municipio'] ?></div>
                                        </div>
                                        <div class="mb-2 d-flex justify-content-around">
                                            <div>CEP: <?php echo $endereco['cep'] ?></div>
                                            <div>Bairro: <?php echo $endereco['bairro'] ?></div>
                                        </div>
                                        <div class="mb-2 d-flex justify-content-around">
                                            <div>Rua: <?php echo $endereco['rua'] ?></div>
                                            <div>Número: <?php echo $endereco['numero'] ?></div>
                                        </div>
                                        <div class="mb-2 d-flex justify-content-around">
                                            <div>Complemento: <?php echo $endereco['complemento'] ?></div>
                                        </div>
                                        <div class="modal-footer pb-2">
                                            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require 'footer.php'; ?>