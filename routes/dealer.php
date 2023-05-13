<?php

use App\Http\Controllers\Dealer\DealerController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['isDealer']], function () {
    Route::get('/dealer/home', [DealerController::class, 'index'])->name('dealer.panel.home');

    Route::get('/dealer/view/checked-orders', [DealerController::class, 'viewCheckedOrders'])->name('dealer.panel.view.checked.orders');
    Route::get('/dealer/view/prepared-orders', [DealerController::class, 'viewPreparedOrders'])->name('dealer.panel.view.prepared.orders');
    Route::get('/dealer/view/done-orders', [DealerController::class, 'viewDoneOrders'])->name('dealer.panel.view.done.orders');
    Route::get('/dealer/view/order-details/{id}/{tracking_id}', [DealerController::class, 'orderDetails'])->name('dealer.panel.view.order.details');
    Route::get('/dealer/view/order-to-refund/{id}/{tracking_id}', [DealerController::class, 'viewToRefund'])->name('dealer.panel.view.to.refund');
    Route::post('/dealer/order/mark-prepared/{id}', [DealerController::class, 'markPrepared'])->name('dealer.panel.mark.order.prepared');
    Route::post('/dealer/order/mark-done/{id}', [DealerController::class, 'markDone'])->name('dealer.panel.mark.order.done');
    Route::post('/dealer/order/refund-order/', [DealerController::class, 'refundOrder'])->name('dealer.panel.mark.order.refunded');
    Route::post('/dealer/order/refund-order-item/', [DealerController::class, 'refundItem'])->name('dealer.panel.mark.item.refunded');

    Route::get('/dealer/checked-orders-counter', [DealerController::class, 'checkedOrdersCounter'])->name('dealer.panel.checked.orders.counter');

    // In Case It is Out of Stock For Some Reason !
    Route::post('/dealer/delete-ifnot-found', [DealerController::class, 'deleteItemIfNotFound'])->name('dealer.panel.delete.not.found');
});
