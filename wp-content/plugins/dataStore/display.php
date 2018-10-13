<?php
echo "<h1>Data store !</h1>";
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<div class="container-fluid">
    <div class="row">
        <div class="col-11">
            <table class="table tab">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>contenu</th>
                    <th>Formulaire</th>
                    <th>stripe_token</th>
                    <th>date</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php

                    foreach ($data as $d)
                    {
                        $content = (array)json_decode($d->content);

                        echo '<tr>';
                        echo '<td>'.$d->id.'</td>';
                        echo '<td>'.$content['your-name'].'</td>';
                        echo '<td>'.$form.'<a href="test"></a></td>';
                        echo '<td>'.$d->stripe_token.'</td>';
                        echo '<td>'.$d->created_at.'</td>';
                        echo '<td><a href="?page=data-store&id='.$d->id.'" class="btn btn-sm btn-success">Voir</a></td>';
                        echo '</tr>';
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

