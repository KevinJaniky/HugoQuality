
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<div class="container-fluid">
	<br>
	<a href="admin.php?page=data-store" class="btn btn-warning">Back to list </a>
    <div class="row">
        <div class="col-11">
        	<div>
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
                        echo '<td>'.$data.'</td>';
                        echo '</tr>';
                    }
                ?>
        	</div>

            
        </div>
    </div>
</div>

