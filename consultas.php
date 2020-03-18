<?php include("header.php")?>
    <div class="body">
        <div class="cabecalho">
            <h1>Consultas cadastradas</h1>
            <div class="search">
                <input type="text" placeholder="Pesquisar" class="shadow">
                <label class="custom-select">
                    <select class="shadow">
                        <option>Pendente</option>
                        <option>Concluída</option>
                        <option>Cancelada</option>
                    </select>
                </label>
                <button class="shadow">Cadastrar</button>
            </div>
        </div>
        <table cellspacing="0" class="shadow">
            <thead class="shadow">
                <tr>
                    <th>Id</th>
                    <th>Veterinário</th>
                    <th>Cliente</th>
                    <th>Pet</th>
                    <th>Data</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="consultasInfo.php" title="Mais informações">1</a></td>
                    <td>teste</td>
                    <td>teste</td>
                    <td>teste</td>
                    <td>teste</td>
                    <td>teste</td>
                    <td><a href="#"><i class="fa fa-trash delete"></i></a></td>
                </tr>
                <tr>
                    <td><a href="#">1</a></td>
                    <td>teste</td>
                    <td>teste</td>
                    <td>teste</td>
                    <td>teste</td>
                    <td>teste</td>
                    <td><a href="#"><i class="fa fa-trash delete"></i></a></td>
                </tr>
                <tr>
                    <td><a href="#">1</a></td>
                    <td>teste</td>
                    <td>teste</td>
                    <td>teste</td>
                    <td>teste</td>
                    <td>teste</td>
                    <td><a href="#"><i class="fa fa-trash delete"></i></a></td>
                </tr>
                <tr>
                    <td><a href="#">1</a></td>
                    <td>teste</td>
                    <td>teste</td>
                    <td>teste</td>
                    <td>teste</td>
                    <td>teste</td>
                    <td><a href="#"><i class="fa fa-trash delete"></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>

