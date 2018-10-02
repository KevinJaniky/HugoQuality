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
                </tr>
                </thead>
                <tbody>
                <?php

                    foreach ($data as $d)
                    {
                        $content = (array)json_decode($d->content);
                        $keys = array_keys($content);
                        $data = "";
                        $form = '';
                        foreach ($content as $key => $value){
                            if($key === 'title'){
                                $form = $value;
                            }else{
                                $data .= '<li><strong>'.$key.'</strong> : <span>'.$value.'</span></li>';
                            }

                        }

                        echo '<tr>';
                        echo '<td>'.$d->id.'</td>';
                        echo '<td>'.$data.'</td>';
                        echo '<td>'.$form.'</td>';
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

