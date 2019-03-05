<?php

class CreateBorrowerService {
	public function make(CreateCoupon $request)
	{
		   $coupon = \App\Coupon::create([
			'code' => $request->get('code'),
			'amount' => $request->get('amount'),
			'max_redemptions' => $request->get('max_redemptions')
		   ]);
		   return $coupon; 
	}
}



?>
