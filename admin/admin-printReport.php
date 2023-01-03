<?php
    require_once '../dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $document = new Dompdf();

    include '..\db.php';
    $trans = mysqli_query($conn, "SELECT * FROM tb_transaction 
    JOIN tb_user ON tb_transaction.user_id = tb_user.user_id  
    JOIN tb_product ON tb_transaction.prod_id = tb_product.prod_id 
    WHERE trans_id = '".$_GET['id_trans']."' ");
    $pTrans = mysqli_fetch_object($trans);

    $gender = $pTrans->prod_gender;
    switch($gender){
        case 0 : $gen = "Male"; break;
        case 1 : $gen = "Female"; break;
        case 2 : $gen = "Unisex"; break;
        default: $gen = "Data Undefined";
    }

    $status = $pTrans->trans_status;
    switch($status){
        case 0 : $stat = "Proses"; break;
        case 1 : $stat = "Verif"; break;
        case 2 : $stat = "Reject"; break;
        default: $stat = "Data Undefined";
    }

    $categ = $pTrans->prod_category;
    switch($categ){
        case 0 : $cat = "Sport Running"; break;
        case 1 : $cat = "Sneakers"; break;
        case 2 : $cat = "Slip On"; break;
        case 3 : $cat = "Flat Shoes"; break;
        case 4 : $cat = "Leather Shoes"; break;
        default: $cat = "Data Undefined";
    }

    $sizes = $pTrans->prod_size;
    switch($sizes){
        case 0 : $size = "36"; break;
        case 1 : $size = "37"; break;
        case 2 : $size = "38"; break;
        case 3 : $size = "39"; break;
        case 4 : $size = "40"; break;
        case 5 : $size = "41"; break;
        case 6 : $size = "42"; break;
        case 7 : $size = "43"; break;
        case 8 : $size = "44"; break;
        case 9 : $size = "45"; break;
        default: $size = "Data Undefined";
    }

    $date = substr(str_replace("-", "", $pTrans->trans_date), 0, 9);
    $idtrans = $pTrans->trans_id.$date;
    $iduser = $pTrans->user_id.$date;
    $idprod = $pTrans->prod_id.$date;
    $idadm = $pTrans->adm_id.$date;

    $html = '
<!DOCTYPE html>
<html lang="en">

<head>

    <style>
        * {
            background-color: linen;
            padding : 10px
        }

        .Header h1, h4, p {
            color: maroon;
            text-align: center;
            margin : 5px;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        table.center {
            margin-left: auto; 
            margin-right: auto;
        }
    </style>

</head>

<body>

    <main>
        <div class="Header">
            <h1>Details Transaction</h1>
            <h4>ZAPATU COMPANY</h4>
            <p>We Empower People to Own the Shoes They Love</p>
        </div>


        <table class="table center" border=1px;>
            <tbody>
                <tr>
                    <th>ID Transaction</th>';
                    $html .= '
                    <td>'. $idtrans ;'</td>
                </tr>';
                $html .= '
                <tr>
                    <th>ID User</th>';
                    $html .= '
                    <td>'. $iduser;'</td>
                </tr>';
                $html .= '
                <tr>
                    <th>ID Product</th>';
                    $html .= '
                    <td>'. $idprod;'</td>
                </tr>';
                $html .= '
                <tr>
                    <th>ID Admin</th>';
                    $html .= '
                    <td>'. $idadm;'</td>
                </tr>';
                $html .= '
                <tr>
                    <th>User Name</th>';
                    $html .= '
                    <td>'. ucwords($pTrans->user_name);'</td>
                </tr>';
                $html .= '
                <tr>
                    <th>User Address</th>';
                    $html .= '
                    <td>'. ucwords($pTrans->receiver_address);'</td>
                </tr>';
                $html .= '
                <tr>
                    <th>User Phone</th>';
                    $html .= '
                    <td>'. $pTrans->receiver_tlp;'</td>
                </tr>';
                $html .= '
                <tr>
                    <th>User Email</th>';
                    $html .= '
                    <td>'. $pTrans->user_email;'</td>
                </tr>';
                $html .= '
                <tr>
                    <th>Product Name</th>';
                    $html .= '
                    <td>'. ucwords($pTrans->prod_name);'</td>
                </tr>';
                $html .= '
                <tr>
                    <th>Product Brand</th>';
                    $html .= '
                    <td>'. ucwords($pTrans->prod_brand);'</td>
                </tr>';
                $html .= '
                <tr>
                    <th>Product Size</th>';
                    $html .= '
                    <td>'. $size;'</td>
                </tr>';
                $html .= '
                <tr>
                    <th>Product Gender</th>';
                    $html .= '
                    <td>'. $gen;'</td>
                </tr>';
                $html .= '
                <tr>
                    <th>Product Category</th>';
                    $html .= '
                    <td>'. $cat;'</td>
                </tr>';
                $html .= '
                <tr>
                    <th>Product Quantity</th>';
                    $html .= '
                    <td>'. $pTrans->prod_qty;'</td>
                </tr>';
                $html .= '
                <tr>
                    <th>Product Price</th>';
                    $html .= '
                    <td>'. 'Rp. '.number_format($pTrans->prod_price);'</td>
                </tr>';
                $html .= '
                <tr>
                    <th>Total Price</th>';
                    $html .= '
                    <td>'. 'Rp. '.number_format($pTrans->total_price);'</td>
                </tr>';
                $html .= '
                <tr>
                    <th>Transaction Status</th>';
                    $html .= '
                    <td>'. $stat;'</td>
                </tr>';
                $html .= '
                <tr>
                    <th>Transaction Date</th>';
                    $html .= '
                    <td>'. $pTrans->trans_date;'</td>
                </tr>';
                $html .= '
                <tr>
                    <th>Status Date</th>';
                    $html .= '
                    <td>'. $pTrans->trans_status_date;'</td>
                </tr>';
                $html .= '
            </tbody>
        </table>

    </main>
</body>

</html>';

    $document->loadHtml($html);
    $document->setPaper('A4', 'portrait');
    $document->render();
    $document->stream("Report-Transaction-". $idtrans, array("Attachment"=>0));
?>