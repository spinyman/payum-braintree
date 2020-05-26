<?php

namespace Payum\Braintree\Action\Api;

use Payum\Core\Exception\RequestNotSupportedException;
use Payum\Core\Model\ArrayObject;
use Payum\Core\Request\Sync;

class DoSyncAction extends BaseApiAwareAction
{
    public function execute($request)
    {
        RequestNotSupportedException::assertSupports($this, $request);

        $model         = $request->getModel();
        $transactionId = $model->offsetGet('transactionId');
        $request->setModel(
            $this->api->find($transactionId)
        );
    }

    public function supports($request)
    {
        return $request instanceof Sync && $request->getModel() instanceof ArrayObject;
    }
}
