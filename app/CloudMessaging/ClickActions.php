<?php
/**
 * Created by PhpStorm.
 * User: Tosh
 * Date: 11/01/2017
 * Time: 15:48
 */

namespace App\CloudMessaging;


class ClickActions
{
    const ACTION_NEW_COMMENT = "com.vibecampo.android.ACTION_NEW_COMMENT";
    const ACTION_NEW_LIKE = "com.vibecampo.android.ACTION_NEW_LIKE";
    const ACTION_NEW_VIBITS = "com.vibecampo.android.ACTION_NEW_VIBITS";
    const ACTION_NEWS = "com.vibecampo.android.ACTION_NEWS";
	
	const ACTION_SENT_FRIEND_REQUEST = "com.vibecampo.android.ACTION_SENT_FRIEND_REQUEST";
	const ACTION_FRIEND_REQUEST_ACCEPTED = "com.vibecampo.android.ACTION_FRIEND_REQUEST_ACCEPTED";
	const ACTION_FRIEND_REQUEST_CANCELED = "com.vibecampo.android.ACTION_FRIEND_REQUEST_CANCELED";
	const ACTION_FRIEND_REQUEST_REJECTED = "com.vibecampo.android.ACTION_FRIEND_REQUEST_REJECTED";
	const ACTION_UNFRIENDED = "com.vibecampo.android.ACTION_UNFRIENDED";
	const ACTION_UNBLOCKED = "com.vibecampo.android.ACTION_UNBLOCKED";
	const ACTION_BLOCKED = "com.vibecampo.android.ACTION_BLOCKED";
}