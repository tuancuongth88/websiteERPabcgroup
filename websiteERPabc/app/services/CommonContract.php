<?php
class CommonContract {

	public static function getNamePartner(){
		return Partner::all()->lists('name', 'id');
	}
	public static function getNameExtend(){
		return Contract::all()->lists('type_extend', 'id');
	}
	public static function getNameType(){
		return Contract::all()->lists('type', 'id');
	}
}
