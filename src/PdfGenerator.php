<?php
namespace ringku\PdfGenerator;

use Barryvdh\DomPDF\Facade\Pdf;

class PdfGenerator
{
    protected $data;
    protected $template;
    protected $options;

    public function setData($data): self
    {
        $this->data = $data;
        return $this;
    }

    public function setTemplate(string $template): self
    {
        $this->template = $template;
        return $this;
    }

    public function setOptions(array $options = []): self
    {
        $this->options = array_merge([
            'title' => 'Generated PDF',
            'paper' => 'a4',
            'orientation' => 'portrait'
        ], $options);

        return $this;
    }

    public function generate()
    {
        if (!$this->template || !$this->data) {
            throw new \Exception('Template and data must be set');
        }

        return Pdf::loadView($this->template, ['data' => $this->data])
            ->setPaper($this->options['paper'], $this->options['orientation'])
            ->stream($this->options['title'] . '.pdf');
    }

    public function download()
    {
        if (!$this->template || !$this->data) {
            throw new \Exception('Template and data must be set');
        }

        return Pdf::loadView($this->template, ['data' => $this->data])
            ->setPaper($this->options['paper'], $this->options['orientation'])
            ->download($this->options['title'] . '.pdf');
    }
}
