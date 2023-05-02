<?php
class MetaData {
  private $DocID;
  private $FileType;
  private $FileSize;
  function __construct($DocID, $FileType, $FileSize) {
    $this->DocID = $DocID;
    $this->FileType = $FileType;
    $this->FileSize = $FileSize;
  }
  function getDocID() {
    return $this->DocID;
  }
  
  function getFileType() {
    return $this->FileType;
  }
  
  function setFileType($FileType) {
    $this->FileType = $FileType;
  }
  
  function getFileSize() {
    return $this->FileSize;
  }
  
  function setFileSize($FileSize) {
    $this->FileSize = $FileSize;
  }
}
?>