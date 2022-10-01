<?php

class FileUploadController extends AppController {
	public function index() {
		$this->set('title', __('File Upload Answer'));

		$file_uploads = $this->FileUpload->find('all');
		$this->set(compact('file_uploads'));
	}

	public function uploadCsv()
	{
		$this->layout = false; 
		$this->render(false);
		if(!$this->request->is('post')) {
			$this->setFlash('Method not allowed!');
			return false;
		} 
		if(isset($this->request->data['FileUpload']) && $this->request->data['FileUpload']['file'])
		{
			$data=$this->request->data['FileUpload']['file'];
			if(isset($data['type']) && $data['type']=='text/csv'){ // checking the filetype/mimetype
				$file = $data['tmp_name'];
				$open = fopen($file, "r");
				$headers = fgetcsv($open);
				
				$upload_data = [];
		
				if ($open !== FALSE) {
					while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
						$records=array();
						foreach ($headers as $key =>$header) {
							$records[strtolower($header)]=(isset($data[$key]) && $data[$key] )?$data[$key]:'';
						}
						$records['created']=date('Y-m-d H:i:s');
						$records['modified']=date('Y-m-d H:i:s');
						$upload_data[]['FileUpload']=$records;
					}
					fclose($open);
				}
				$this->FileUpload->create();
				if($this->FileUpload->saveMany($upload_data)){
					$this->setFlash('Import data successful');
					return $this->redirect('/FileUpload');
				}else{
					$this->setFlash('Error occur in Importing data');
				}

			}else{
				$this->setFlash('Error! Invalid file type');
			}
		}else{
			$this->setFlash('There has no valid file.');
		}
		return $this->redirect('/FileUpload');
	}
}