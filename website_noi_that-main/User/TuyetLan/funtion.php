<?php
function addNew($table, $data, $conn)
{
    $field = "";
    $values = "";
    if (is_array($data)) {
        $i = 0;
        foreach ($data as $key => $val) {
            if ($key != "addNew") {
                $i++;
                if ($i == 1) {
                    $field .= $key;
                    $values .= "'" . $conn->real_escape_string($val) . "'";
                } else {
                    $field .= "," . $key;
                    $values .= ",'" . $conn->real_escape_string($val) . "'";
                }
            }
        }
        $sql = "INSERT INTO $table ($field) VALUES ($values)";
        if ($conn->query($sql)) {
            $id = $conn->insert_id; // Trả về ID gần nhất
            return $id;
        } else {
            // Xử lý lỗi nếu cần
            echo "Lỗi khi thêm dữ liệu vào cơ sở dữ liệu: " . $conn->error;
            return false;
        }
    }
    return false;
}
?>
