<?php
class CommonResource {

	public static function getTypeResource($id)
	{
		return ResourceDevice::find($id)->name;
	}
	public static function getResourceDevice()
	{
		return ResourceDevice::all()->lists('name', 'id');
	}
	
}