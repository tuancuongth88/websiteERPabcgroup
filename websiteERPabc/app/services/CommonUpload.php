<?php
class CommonUpload {

	// type=1:upload avatar product
	// type=2:upload avatar user
	public static function commonUploadImage($input, $path, $type = null)
	{
		$data = null;
		if (isset($input['linkFile'])) {
			foreach ($input['linkFile'] as $key => $value) {
				$filename[$key] = $value->getClientOriginalName();
				$filename[$key] = changeFileNameImage($filename[$key]);
				$filename[$key] = $key.$filename[$key];
				$pathUpload = public_path() . $path . '/' . Auth::user()->id;
				$uploadSuccess = $value->move($pathUpload, $filename[$key]);
				if ($key == 0) {
					if($type == 1) {  
						$image = Image::make(sprintf(''.$pathUpload.'/%s', $filename[$key]))
							//->resize(PRODUCT_AVATAR_WIDTH, PRODUCT_AVATAR_HEIGHT)
							->save();
 					} else {       
 						$image = Image::make(sprintf(''.$pathUpload.'/%s', $filename[$key]))
							->resize(USER_AVATAR_WIDTH, USER_AVATAR_HEIGHT)
							->save();
 					}
				}
				else { 
					$image = Image::make(sprintf(''.$pathUpload.'/%s', $filename[$key]))
						//->resize(PRODUCT_SLIDE_WIDTH, PRODUCT_SLIDE_HEIGHT)
						->save();
				}
				$data[$key] = ['linkFile' =>  $filename[$key]];

			}
			return Common::returnData($data);
		}
        throw new Prototype\Exceptions\UploadErrorException();
	}
	public static function uploadFile($input, $path){
		// if (isset($input['linkFile']))
		// 	{
		if (Input::hasFile('linkFile'))
			{
				$pathUpload =  $path  ;
			    $file = Input::file('linkFile');
				dd($file);			    
			    Input::file('linkFile')->move(''.$pathUpload.'/%s' ,'images/user');
			    // $file->move(''.$pathUpload.'/%s' , $file->getClientOriginalName());
		 
			    $image = Image::make(sprintf($pathUpload, $file->getClientOriginalName()))->resize(USER_AVATAR_WIDTH, USER_AVATAR_HEIGHT)->save();
			}
	}

}