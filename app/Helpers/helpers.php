<?php

if (! function_exists('limitText')) {
    /**
     * Giới hạn số ký tự của một chuỗi mà không cắt giữa từ.
     *
     * @param string $text Nội dung cần giới hạn.
     * @param int $limit Số ký tự tối đa.
     * @param string $end Chuỗi kết thúc (mặc định là ' ...').
     * @return string
     */
    function limitText($text, $limit = 200, $end = ' ...') {
        if (mb_strlen($text) <= $limit) {
            return $text;
        }
        // Cắt theo số ký tự
        $textCut = mb_substr($text, 0, $limit);
        // Tìm vị trí khoảng trắng cuối cùng để không cắt giữa từ
        $lastSpace = mb_strrpos($textCut, ' ');
        if ($lastSpace !== false) {
            $textCut = mb_substr($textCut, 0, $lastSpace);
        }
        return $textCut . $end;
    }
}
