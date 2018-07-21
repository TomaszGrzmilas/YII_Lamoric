
<table class="table">
  <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
    <?
        foreach ($dataProvider as $key =>$doc) {
            foreach ($doc as $k =>$d) {
                echo '<th scope="col">'. $model->getAttributeLabel($k) .'</th>';
            }
            break;
        }
    ?>
    </tr>
  </thead>
  <tbody>
    <?
        $cnt = 0;
        foreach ($dataProvider as $key =>$doc) {
            $cnt++;
            echo '<tr>';
            echo '<th scope="row">'.$cnt.'</th>';
            foreach ($doc as $k =>$d) {
                echo '<td>'.$d.'</td>';
            }
            echo '</tr>';
        }
    ?>
    
  </tbody>
</table>