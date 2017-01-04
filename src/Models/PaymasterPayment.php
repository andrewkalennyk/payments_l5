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
        $paymasterData['LMI_HASH'] = '';
        
        $xml = view('payments::paymaster.command', compact('paymasterData'))->render();
        $hash = $xml . 
        dr($xml);
    }

}