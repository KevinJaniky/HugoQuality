<?php
echo "<h1>S!</h1>";

var_dump($data);
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
                    <th>stripe_token</th>
                    <th>date</th>
                </tr>
                </thead>
                <tbody>
                <?php

                    foreach ($data as $d)
                    {
                        echo '<tr>';
                        echo '<td>'.$d->id.'</td>';
                        echo '<td>'.$d->content.'</td>';
                        echo '<td>'.$d->stripe_token.'</td>';
                        echo '<td>'.$d->created_at.'</td>';
                        echo '</tr>';
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

