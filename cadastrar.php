<?php require 'header.php';
require 'classes/clientes.class.php';
if(isset($_POST['cpf']) && !empty($_POST['cpf']) && !empty($_POST['email'])) {
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $cpf = addslashes($_POST['cpf']);
    $email = addslashes($_POST['email']);
    $estado = addslashes($_POST['estado']);
    $municipio = addslashes($_POST['municipio']);
    $cep = addslashes($_POST['cep']);
    $bairro = addslashes($_POST['bairro']);
    $rua = addslashes($_POST['rua']);
    $numero = addslashes($_POST['numero']);
    $complemento = addslashes($_POST['complemento']);

    $clientes = new clientes();
    $mensagem = $clientes->addCliente($nome, $telefone, $cpf, $email, $estado, $municipio, $cep, $bairro, $rua, $numero, $complemento);
}
?>
<title>Cadastrar cliente</title>

<div class="container">
    <?php if(!empty($mensagem)): ?>
        <div class="d-flex justify-content-center w-100">
            <div style="max-width:500px;" class="alert alert-<?php echo $mensagem == "true" ? "success" : "warning"?> w-100"><?php echo $mensagem == "true" ? "Cliente cadastrado com sucesso!" : "Email ou e/CPF já cadastrado!" ?></div>
        </div>
    <?php endif; ?>
    
    <form class="d-flex flex-column align-items-center" method="POST">
        <h5 class="text-dark input-area mb-0" id="titulo-endereco">Dados pessoais:</h5>
        <hr class="input-area">
        <div class="mb-2 input-area">
            <label class="form-label" for="nome">Nome</label>
            <input class="form-control form-control-sm" id="nome" type="text" name="nome">
        </div>
        <div class="mb-2 input-area">
            <label class="form-label" for="telefone">Telefone</label>
            <input class="form-control form-control-sm" id="telefone" type="text" name="telefone">
        </div>
        <div class="mb-2 input-area">
            <label class="form-label" for="cpf">CPF</label>
            <input class="form-control form-control-sm" id="cpf" type="text" name="cpf">
        </div>
        <div class="mb-2 input-area">
            <label class="form-label" for="email">E-mail</label>
            <input class="form-control form-control-sm" id="email" type="email" name="email" require>
        </div>

        <div class="mb-2 input-area">
            <h5 class="fs-5 text-dark" id="titulo-endereco">Endereço:</h5>
            <hr>
            <div class="mb-2">
                <label class="form-label" for="estado">Estado</label>
                <input class="form-control form-control-sm" id="estado" type="text" name="estado">
            </div>
            <div class="mb-2 d-flex justify-content-between">
                <div class="w-100">
                    <label class="form-label" for="municipio">Município</label>
                    <input class="form-control form-control-sm" id="municipio" type="text" name="municipio">
                </div>
                <div class="input-menor">
                    <label class="form-label" for="cep">CEP</label>
                    <input class="form-control form-control-sm" id="cep" type="text" name="cep">
                </div>
            </div>
            <div class="mb-2">
                <label class="form-label" for="bairro">Bairro</label>
                <input class="form-control form-control-sm" id="bairro" type="text" name="bairro">
            </div>
            <div class="mb-2 d-flex justify-content-between">
                <div class="w-100">
                    <label class="form-label" for="rua">Rua</label>
                    <input class="form-control form-control-sm" id="rua" type="text" name="rua">
                </div>
                <div class="input-menor">
                    <label class="form-label" for="numero">Número</label>
                    <input class="form-control form-control-sm" id="numero" type="number" name="numero">
                </div>
            </div>
            <div class="mb-2">
                <label class="form-label" for="complemento">Complemento</label>
                <input class="form-control form-control-sm" id="complemento" type="text" name="complemento">
            </div>
        </div>
        <div class=" w-100 d-flex justify-content-center">
            <button class="btn btn-md btn-primary" type="submit">Cadastrar</button>
        </div>
    </form>
</div>
<?php require 'footer.php';?>