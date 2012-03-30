<?php
// Written by Laurens Ramandt
class pdfFile{
	private $filename;
	private $fcontents;
	private $lastObjectEnd;
	private $newObjectNr;
	private $insertedPrintCode=false;
	
	private function pdf_getHighestObjNr($pdfContents){
		preg_match_all('[\d+\s0\s(obj)]', $pdfContents, $matches);
		
		for($i=0; $i<=count($matches[0])-1; $i++){
			$matches[0][$i] = str_replace(" 0 obj", "", $matches[0][$i]);
		}
		return max($matches[0]);
	}	
	
	private function pdf_getLastObjEnd($pdfContents){
		return strripos($pdfContents, "endobj" . chr(13) . "xref" . chr(13) . "0")+strlen("endobj" . chr(13));	
	}
		
	public function __construct($filename)
	{
		$this->filename = $filename;
		$this->fcontents = file_get_contents($filename) or die("Incorrect filename");
		
		$this->lastObjectEnd =	$this->pdf_getLastObjEnd($this->fcontents);
		$this->newObjectNr =	$this->pdf_getHighestObjNr($this->fcontents)+1;
	}
		
	public function insertPrintCode(){
		if(!$this->insertedPrintCode){
			$insertion="";
			$insertion .= ($this->newObjectNr) . " 0 obj" . chr(13);
			$insertion .= "<</S/JavaScript/JS(this.print\({bUI:true,bSilent:false,bShrinkToFit:true}\);)>>";
			$insertion .= chr(13) . "endobj";
			$this->fcontents = substr_replace($this->fcontents, $insertion . chr(13),$this->lastObjectEnd,0);
			$this->fcontents = str_replace("/Type /Catalog ", "/Type /Catalog " . chr(13) . "/OpenAction " . $this->newObjectNr . " 0 R", $this->fcontents);
			$this->insertedPrintCode=true;
		}		
	}
	
	public function saveAs($filename){
		@unlink($filename);
		$h=fopen($filename, "w+");
		fwrite($h, $this->fcontents);
		fclose($h);
	} 
	
	public function getFileContents(){
		return $this->fcontents;
	}
	
	public function __toString(){
		header("Content-type: application/pdf");
		$this->insertPrintCode();
		return $this->getFileContents();		
	}
}
?>