<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Repositories\TransactionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use App\Models\CurrencyHistory;
use App\Models\ForeingExchange;

class TransactionController extends AppBaseController
{
    /** @var  TransactionRepository */
    private $transactionRepository;

    public function __construct(TransactionRepository $transactionRepo)
    {
        $this->transactionRepository = $transactionRepo;
    }

    /**
     * Display a listing of the Transaction.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transactionRepository->pushCriteria(new RequestCriteria($request));
        $transactions = $this->transactionRepository->all();

        return view('transactions.index')
            ->with('transactions', $transactions);
    }

    /**
     * Show the form for creating a new Transaction.
     *
     * @return Response
     */
    public function create()
    {
        
        $monedas = ForeingExchange::pluck("name", "id")->prepend('Por favor seleccione uno', null);
        $cuentas_user=Auth::user()->cuentas;
        foreach($cuentas_user as $arraycuenta)
        {
            $cuentas[] = ["id" =>$arraycuenta->id , "name" => $arraycuenta->beneficiary_name];
        }
        return view('transactions.create',compact('cuentas','monedas'));
    }

    /**
     * Store a newly created Transaction in storage.
     *
     * @param CreateTransactionRequest $request
     *
     * @return Response
     */
    public function store(CreateTransactionRequest $request)
    {
        $monedas = CurrencyHistory::all();
        $moneda = $monedas->last()->id;
        $input = $request->all();
        $input['users_id'] = Auth::user()->id;
        $input['currency_histories_id'] = $moneda;
        $input['statuses_id'] = 1;
        $input['systemvoucher'] = 0;
        $input['net']=0;
        $input['utility']=0;
        
        if($request->file('customervoucher'))
        {
            $file = $request->file('customervoucher');
            $hoy = getdate();
            $nombre = $input['users_id'].'_'.$hoy['mon'].'_'.$hoy['mday'].'_'.$hoy['year'].':'.$hoy['hours'].'-'.$hoy['minutes'].'-'.$hoy['seconds'].'.'.$file->getClientOriginalExtension();
            
            \Storage::disk('public')->put($nombre,  \File::get($file));
            $input['customervoucher']= $nombre;
            $transaction = $this->transactionRepository->create($input);
            Flash::success('Transaction saved successfully.');
        }
        else{
            Flash::error('No se cargo archivo, no se creo');
        }
        return redirect(route('transactions.index'));
        
    }

    /**
     * Display the specified Transaction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transaction = $this->transactionRepository->findWithoutFail($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        return view('transactions.show')->with('transaction', $transaction);
    }

    /**
     * Show the form for editing the specified Transaction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transaction = $this->transactionRepository->findWithoutFail($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        return view('transactions.edit')->with('transaction', $transaction);
    }

    /**
     * Update the specified Transaction in storage.
     *
     * @param  int              $id
     * @param UpdateTransactionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransactionRequest $request)
    {
        $transaction = $this->transactionRepository->findWithoutFail($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        $transaction = $this->transactionRepository->update($request->all(), $id);

        Flash::success('Transaction updated successfully.');

        return redirect(route('transactions.index'));
    }

    /**
     * Remove the specified Transaction from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transaction = $this->transactionRepository->findWithoutFail($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        $this->transactionRepository->delete($id);

        Flash::success('Transaction deleted successfully.');

        return redirect(route('transactions.index'));
    }
    
    public function calculadora(){
        $monedas = ForeingExchange::pluck("name", "id")->prepend('Por favor seleccione uno', null);
        return view('calculadora.create',compact('monedas'));
    }
    public function calcular(Request $request){
        $tasas = CurrencyHistory::where('foreing_exchange_id','=',$request->moneda)->get();
        //dd($tasas->last()->price);
        $tasa = $tasas->last()->price;
        //$adiconal ;
        switch ($request->moneda) {
            case 1:
                //usd
                $request->valor = $request->valor-1;
                break;
            case 2:
                //sol
                $request->valor = $request->valor-3;
                break;
        }
        $valor = ($tasa * $request->valor);
        Flash::success('$ '.$valor.'<br> Bolivares Soberanos. <br> (Costos aplicados).');
        return redirect(route('calculadora.create'));
    }
}
