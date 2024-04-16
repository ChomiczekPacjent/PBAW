<?php
require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/CalcForm.class.php';
require_once $conf->root_path.'/app/CalcResult.class.php';


class CalcCtrl {

	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku
	
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->msgs = new Messages();
		$this->form = new CalcForm(); //obiekt na dane z formularza -> amount, years, interest
		$this->result = new CalcResult();
	}
	
	public function getParams(){
                $this->form->amount = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : null;
                $this->form->interest = isset($_REQUEST['interest']) ? $_REQUEST['interest'] : null;
                $this->form->years = isset($_REQUEST['years']) ? $_REQUEST['years'] : null;                
	}
	

        function validate(){
                // sprawdzenie, czy parametry zostały przekazane
                if ( ! (isset($this->form->amount) && isset($this->form->interest) && isset($this->form->years))) {
                        // sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
                        // teraz zakładamy, ze nie jest to błąd. Po prostu nie wykonamy obliczeń
                        return false;
                }
                
                //$infos [] = 'Przekazano parametry.';
                
                
                // sprawdzenie, czy potrzebne wartości zostały przekazane
                if ( $this->form->amount == "") {
                        $this->msgs->addError('Nie podano kwoty kredytu.');
                }
                if ( $this->form->years == "") {
                        $this->msgs->addError('Nie podalno liczby rat.');
                }
                if (  $this->form->interest == "") {
                       $this->msgs->addError('Nie podano oprocentowania.');
                }

                //nie ma sensu walidować dalej gdy brak parametrów
                if (! $this->msgs->isError()) {

                // sprawdzenie, czy $x i $y są liczbami całkowitymi
                    if (! is_numeric( $this->form->amount )) {
                        $this->msgs->addError('Wprowadzona wartość dla kwoty nie jest liczbą.');
                    }

                    if (! is_numeric( $this->form->years )) {
                       $this->msgs->addError('Wprowadzona ilość lat nie jest liczbą.');
                    }	
                    if (! is_numeric( $this->form->interest )) {
                        $this->msgs->addError('Wprowadzone oprocentowanie nie jest liczbą.');
                    } 
                }

//                if (count ( $msgs ) != 0) return false;
//                else return true;  
 
                return ! $this->msgs->isError(); //zastępuje powyższe
        }
        
	
	public function process(){

		$this->getparams();
		
		if ($this->validate()) {
					
                        $this->form->amount = floatval($this->form->amount);
                        $this->form->years = floatval($this->form->years);
                        $this->form->interest = floatval($this->form->interest);
                        $this->msgs->addInfo('Parametry poprawne.');
                      
                        $this->result->result = round((($this->form->amount * ($this->form->interest/100)) + $this->form->amount)/ ($this->form->years * 12),2);
                        $this->result->total =  $this->result->result * $this->form->years * 12;
                        
                        $this->msgs->addInfo('Wykonano obliczenia.');
                }
                            
		$this->generateView();
	}
	/**
	 * Wygenerowanie widoku
	 */
	public function generateView(){
		global $conf;
		
		$smarty = new Smarty();
		$smarty->assign('conf',$conf);
		
		$smarty->assign('page_title','Kalkulator kredytowy');
                $smarty->assign('page_description','Obliczanie miesięcznej raty kredytu.');
                $smarty->assign('page_header','Kalkulator');
				
		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('res',$this->result);
		
		$smarty->display($conf->root_path.'/app/calc_view_kredytowy.html');
	}
}
