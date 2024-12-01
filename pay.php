<?php
require('razorpay-php/razorpay-php/Razorpay.php'); require('config.php');
// if(!isset($_SESSION['email'])){
//     header("location:index.php");
//     exit();
// }
// else{

// }


?>


<header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end mb-4 page-title">
                	<h3 class="text-white">Payment</h3>
                    <hr class="divider my-4" />
                </div>
                <!-- <?php
                include("gateway-config.php");
                use Razorpay\Api\Api;

                $api = new Api($keyId, $keySecret);
                $firstname = $_SESSION['login_first_name'];
                $lastname = $_SESSION['login_last_name'];
                $mobile = $_SESSION['login_mobile'];
                $address =  $_SESSION['login_address'];
                $email = $_SESSION['login_email'];
                $sql = "SELECT * from products WHERE pid=:pid";
                        $stmt = $db->prepare($sql);
                        $stmt->bindParam(':pid', $pid, PDO::PARAM_INT);
                            $stmt->execute();
                            $row=$stmt->fetch();
                            $price=$row('price');
                            $_SESSION['price']=$price;
                            $title=$row['title'];
                            $webtitle='YourRestoz';
                            $imageurl = 'https://image.similarpng.com/very-thumbnail/2020/06/Restaurant-logo-with-chef-drawing-template-on-transparent-background-PNG.png';
                            $displayCurrency = 'INR';
                            $orderData = [
                                'receipt'         => 3456,
                                'amount'          => $price * 100, // 2000 rupees in paise
                                'currency'        => 'INR',
                                'payment_capture' => 1 // auto capture
                            ];
                            $razorpayOrder = $api->order->create($orderData);

                            $razorpayOrderId = $razorpayOrder['id'];

                            $_SESSION['razorpay_order_id'] = $razorpayOrderId;

                            $displayAmount = $amount = $orderData['amount'];
                            {
                                $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
                                $exchange = json_decode(file_get_contents($url), true);
                            
                                $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
                            }
                            $data = [
                                "key"               => $keyId,
                                "amount"            => $amount,
                                "name"              => $webtitle,
                                "description"       => "Tron Legacy",
                                "image"             => $imageurl,
                                "prefill"           => [
                                "name"              => $firstname.''.$lastname,
                                "email"             => "customer@merchant.com",
                                "contact"           => "9999999999",
                                ],
                                "notes"             => [
                                "address"           => "Hello World",
                                "merchant_order_id" => "12312321",
                                ],
                                "theme"             => [
                                "color"             => "#F37254"
                                ],
                                "order_id"          => $razorpayOrderId,
                            ];
                            if ($displayCurrency !== 'INR')
                            {
                                $data['display_currency']  = $displayCurrency;
                                $data['display_amount']    = $displayAmount;
                            }
                            
                            $json = json_encode($data);
                                                        
                 ?> -->

                
            </div>
        </div>
    </header>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="" id="checkout-frm">
                    <h4>Payer details</h4>
                    <div class="form-group">
                        <label for="" class="control-label">Firstname</label>
                        <input type="text" name="first_name" required="" class="form-control" value="<?php echo $_SESSION['login_first_name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Email</label>
                        <input type="text" name="last_name" required="" class="form-control" value="<?php echo $_SESSION['login_last_name'] ?>">
                    </div>
                    <div class="form-group">    
                        <label for="" class="control-label">Contact</label>
                        <input type="text" name="mobile" required="" class="form-control" value="<?php echo $_SESSION['login_mobile'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Address</label>
                        <textarea cols="30" rows="3" name="address" required="" class="form-control"><?php echo $_SESSION['login_address'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Email</label>
                        <input type="email" name="email" required="" class="form-control" value="<?php echo $_SESSION['login_email'] ?>">
                    </div>  

                    <div class="text-center">
                        <button class="btn btn-block btn-outline-primary">Pay</button>
                        
                        } 
                    </div>
                </form>
            </div>
        </div>
    </div>
   

    <script>
    $(document).ready(function(){
          $('#checkout-frm').submit(function(e){
            e.preventDefault()
          
            start_load()
            $.ajax({
                url:"admin/ajax.php?action=save_order",
                method:'POST',
                data:$(this).serialize(),
                success:function(resp){
                    if(resp==1){
                        alert_toast("Order successfully Placed.")
                        setTimeout(function(){
                            location.replace('pay.php')
                        },1500)
                    }
                }
            })
        })
        })
    </script>