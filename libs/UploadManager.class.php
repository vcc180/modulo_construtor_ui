<?php 
class UploadManager
{
    private array $config = [];
    private string $error = '';
    private string $fileName = '';

    public function upload(string $dir, string $file, int $maxMB = 2, bool $rename = true): bool
    {
        if (!isset($_FILES[$file]) || $_FILES[$file]['error'] !== 0) {
            $this->error = "Erro no upload.";
            return false;
        }

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        $maxSize = 1024 * 1024 * $maxMB;

        if ($_FILES[$file]['size'] > $maxSize) {
            $this->error = "Arquivo muito grande.";
            return false;
        }

        $ext = strtolower(pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION));

        $permitidos = ['jpg','jpeg','png','gif','pdf','doc','docx','csv'];

        if (!in_array($ext, $permitidos)) {
            $this->error = "Extensão não permitida.";
            return false;
        }

        // Validação real de MIME
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $_FILES[$file]['tmp_name']);
        finfo_close($finfo);

        if (!$mime) {
            $this->error = "Arquivo inválido.";
            return false;
        }

        $this->fileName = $rename
            ? uniqid() . '.' . $ext
            : preg_replace('/[^a-zA-Z0-9._-]/', '', $_FILES[$file]['name']);

        $destino = rtrim($dir, '/') . '/' . $this->fileName;

        if (!move_uploaded_file($_FILES[$file]['tmp_name'], $destino)) {
            $this->error = "Erro ao mover arquivo.";
            return false;
        }

        return true;
    }

    public function getError(): string
    {
        return $this->error;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }
}
