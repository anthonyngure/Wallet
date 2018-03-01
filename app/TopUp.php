<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	/**
 * App\TopUp
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $provider
 * @property string|null $client_account
 * @property string|null $product_name
 * @property string|null $phone_number
 * @property string|null $value
 * @property string|null $provider_meta_data
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TopUp whereClientAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TopUp whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TopUp whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TopUp wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TopUp whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TopUp whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TopUp whereProviderMetaData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TopUp whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TopUp whereValue($value)
 */
	class TopUp extends Model
	{
		//
		protected $fillable = [
			'provider', 'client_account', 'product_name', 'phone_number', 'value', 'provider_meta_data',
		];
	}
