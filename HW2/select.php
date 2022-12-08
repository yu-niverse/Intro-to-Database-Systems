<?php
    include 'connect.php';

    if (isset($_POST["s_name"])) {
        $s_name = $_POST['s_name'];
        $stmt = $conn->prepare("select * from meals where binary shop_name = :shop_name");
        $stmt->execute(array('shop_name' => $s_name));
        $meals = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $output = '<button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">'.$s_name.' Menu</h4>
        <div class="row modal-body">
            <div class="col-xs-12">
            <table class="table" style=" margin-top: 15px;">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Meal name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Order Check</th>
                </tr>
                </thead>
                <tbody>';
        for ($j = 0; $j < count($meals); $j++): 
            $next_j = $j + 1;
            $output .= '<tr>
            <th scope="row">'.$next_j.'</th>
            <td><img src="data:'.$meals[$j]["m_image_type"].';base64,'.$meals[$j]["m_image"].'" width="100" height="100" /></td>
            <td>'.$meals[$j]["m_name"].'</td>
            <td>'.$meals[$j]["m_price"].'</td>
            <td>'.$meals[$j]["m_quantity"].'</td>
            <td> <input type="checkbox" id="cbox1" value=".$meals[$j]["m_name"]."></td>
            </tr>';
        endfor;
        $output .= '</tbody>
                </table>
                </div>
            </div>';

        echo $output;
    }
?>
