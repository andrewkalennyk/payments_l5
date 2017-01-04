<? 
namespace Vis\Payments;

class PaymasterPayment
{
    protected $merchId = '';
    protected $data = "";
    public $paymentInfo = "";

    public function __construct($data)
    {
        if(is_array($data) && !empty($data)) {
            $this->data = $data;
        }
        $this->merchId = config('payments.config.paymaster.merchId'); //todo: do this
        $this->redirectRoute = 'order_redirect';
    } // end __construct
    

    public function initPayment()
    {
        $paymasterProducts['LMI_PAYMENT_AMOUNT'] = $this->data['amount'];
        $paymasterProducts['LMI_PAYMENT_DESC']   = $this->data['description'];
        $paymasterProducts['LMI_MERCHANT_ID'] = $this->merchId;
        $paymasterProducts['LMI_PAYMENT_NO'] = $this->data['orderId'];

        $this->paymentInfo = $paymasterProducts;
        
        return true;
    }
    
    public function checkPayment()
    {
        $paymasterData['LMI_MERCHANT_ID'] = $this->merchId;
        $paymasterData['LMI_PAYMENT_NO'] = $this->data['orderId'];
        
        $xml = view('payments::paymaster.command', compact('paymasterData'))->render();
        $hash = hash( 'sha256', $xml . $this->data['secretKey'] );

        $xml = view('payments::paymaster.command', compact('paymasterData','hash'))->render();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_URL, "https://api.paymaster.ua/merchants/get-transaction");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        $content=curl_exec($ch);
        $result = simplexml_load_string($content);
        if ($result) {
            return $result->Retdata->Transaction;
        } else {
            return false;
        }
        
       
    }

}