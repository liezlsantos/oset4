class DOMPDF_ext extends DOMPDF {

  public function reset() {
    $this->initialize();
    if ($this->_pdf != null) {
        $this->_pdf->new_page();
    }
  }

  public function insert_html($html) {
    $this->reset();
    $this->load_html($html);
    $this->render();
  }
}
