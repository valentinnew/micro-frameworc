<?php declare(strict_types=1);


namespace MF;


class View
{
    /**
     * @var View|null
     */
    protected $layout;

    public function __construct(array $config = [])
    {
        $this->layout = $config['layout'];
    }

    public function render(string $template, array $params = []): string
    {
        $content = $this->renderTemplate($template, $params);
        if ($this->layout) {
            return $this->renderTemplate($this->layout, [
                'content' => $content,
                'contentParams' => $params,
            ]);
        } else {
            return $content;
        }
    }

    public function renderTemplate(string $file, array $params): string
    {
        if (!file_exists($file)) {
            throw new \Exception(sprintf('file %s is not exists', $file));
        }

        ob_start();
        include($file);
        $result = ob_get_contents();
        ob_end_clean();
        return $result;
    }
}