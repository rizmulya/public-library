<?php
class Crud {
    private $conn;

    public function __construct($database) {
        $this->conn = $database->getConnection();
    }
    
    public function createData($table, $data) {
        $table = $this->conn->real_escape_string($table);
    
        $columns = implode(",", array_keys($data)); // "a,b,c"
        $placeholders = implode(",", array_fill(0, count($data), "?")); // "?,?,?"
    
        $values = array_values($data);
        $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $stmt = $this->conn->prepare($query);
    
        if ($stmt) {
            // Determine parameter types
            $types = "";
            foreach ($values as $value) {
                if (is_int($value)) {
                    $types .= "i"; // Integer
                } elseif (is_float($value)) {
                    $types .= "d"; // Double (floating-point)
                } elseif (is_string($value)) {
                    $types .= "s"; // String
                } else {
                    $types .= "s";
                }
            }
    
            // Bind the values
            $stmt->bind_param($types, ...$values);
            // Execute the statement
            $result = $stmt->execute();
            return $result === TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function createDataWithImage($table, $data, $image_database_name, $image_input_name, $upload_folder = BASEURL."/img/", $max_size = 2097152, $allowed_formats = ['jpg', 'png', 'jpeg']) {
        $table = $this->conn->real_escape_string($table);
        $image_database_name = $this->conn->real_escape_string($image_database_name);
        $image_input_name = $this->conn->real_escape_string($image_input_name);
    
        $file_name = $_FILES[$image_input_name]['name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $new_file_name = uniqid() . '.' . $file_ext;
        $file_size = $_FILES[$image_input_name]['size'];
        $file_tmp_name = $_FILES[$image_input_name]['tmp_name'];
    
        if (in_array($file_ext, $allowed_formats)) {
            if ($file_size < $max_size) {
                if (move_uploaded_file($file_tmp_name, $upload_folder . $new_file_name)) {
                    $data[$image_database_name] = $new_file_name;
                    if ($this->createData($table, $data)) {
                        return true;
                    } else {
                        return false; // Gagal membuat data
                    }
                } else {
                    return false; // Gagal mengunggah gambar
                }
            } else {
                return false; // Ukuran file terlalu besar
            }
        } else {
            return false; // Format file tidak diizinkan
        }
    }
    

    // READ data
    public function readData($table, $columns = "*", $condition = "") {
        // Sanitize and validate table name
        $table = $this->conn->real_escape_string($table);
        
        // Prepare the query
        $query = "SELECT $columns FROM $table";
        
        if ($condition != "") {
            $query .= " WHERE $condition";
        }
        
        // Execute the query
        $result = $this->conn->query($query);
        
        // Fetching the result
        $data = [];
        
        if ($result) {
            while($row = $result->fetch_assoc()) {
                // Cleanse output to prevent XSS
                $cleanedRow = array_map('htmlspecialchars', $row);
                $data[] = $cleanedRow;
            }
        }
        
        return $data;
    }

    public function readDataOne($table, $condition) {
        // Sanitize and validate table name
        $table = $this->conn->real_escape_string($table);
        // Prepare the query
        $sql = "SELECT * FROM $table WHERE $condition";
        // Execute the query
        $result = $this->conn->query($sql);
    
        // Fetching the result
        if ($result) {
            $row =  $result->fetch_assoc();
            if ($row) {
                // Cleanse output to prevent XSS
                $cleanedRow = array_map('htmlspecialchars', $row);
                return $cleanedRow;
            }
        }
    
        return false;
    }
    

    // UPDATE data
    public function updateData($table, $data, $condition) {
        // Prepare the SET clause
        $setClause = "";
        $params = [];
        $types = "";
    
        foreach($data as $key => $value) {
            $setClause .= "$key=?,";
            $params[] = $value;
    
            // Determine the parameter type
            if (is_int($value)) {
                $types .= "i"; // Integer
            } elseif (is_float($value)) {
                $types .= "d"; // Double (floating-point)
            } elseif (is_string($value)) {
                $types .= "s"; // String
            } else {
                $types .= "s"; // Default to string 
            }
        }
        $setClause = rtrim($setClause, ",");

        $query = "UPDATE $table SET $setClause WHERE $condition";
    
        $stmt = $this->conn->prepare($query);
    
        if ($stmt) {
            $stmt->bind_param($types, ...$params);
            $result = $stmt->execute();
            return $result === TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function updateDataWithImage($table, $data, $condition, $image_database_name, $image_input_name, $upload_folder = "img/", $max_size = 2097152, $allowed_formats = ['jpg', 'png', 'jpeg']) {
        // Sanitize and validate
        $table = $this->conn->real_escape_string($table);
        $image_database_name = $this->conn->real_escape_string($image_database_name);
        $image_input_name = $this->conn->real_escape_string($image_input_name);
    
        // Filtering image
        $file_name = $_FILES[$image_input_name]['name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $new_file_name = uniqid() . '.' . $file_ext;
        $file_size = $_FILES[$image_input_name]['size'];
        $file_tmp_name = $_FILES[$image_input_name]['tmp_name'];
    
        if (!$file_tmp_name == "") {
            if (in_array($file_ext, $allowed_formats)) {
                if ($file_size < $max_size) {
                    $data_file = $this->readDataOne($table, $condition);
                    $old_image_path = $upload_folder.$data_file[$image_database_name];

                    if (file_exists($old_image_path)) {
                        move_uploaded_file($file_tmp_name, $upload_folder.$new_file_name); // Upload file
                        unlink($old_image_path); // delete old image
                        // Update data
                        $data[$image_database_name] = $new_file_name;
                        return $this->updateData($table, $data, $condition);
                    } else {
                        return false; // Old image not found
                    }

                } else {
                    return false; // Failed! Maximum file size is 2mb
                }
            } else {
                return false; // Failed! Only allowed formats are jpg, jpeg, gif, png
            }
        } else {
            return $this->updateData($table, $data, $condition);
        }
    }
    
    public function updateCustom($table, $setClause, $condition, $params) {
        // Prepare the SET clause
        $setClause = rtrim($setClause, ",");
        $types = "";
        foreach ($params as $param) {
            if (is_int($param)) {
                $types .= "i"; 
            } elseif (is_float($param)) {
                $types .= "d"; 
            } elseif (is_string($param)) {
                $types .= "s"; 
            } else {
                $types .= "s"; 
            }
        }
        
        $query = "UPDATE $table SET $setClause WHERE $condition";
        $stmt = $this->conn->prepare($query);
        if ($stmt) {
            $stmt->bind_param($types, ...$params);
            $result = $stmt->execute();
            return $result === TRUE;
        } else {
            return FALSE;
        }
    }
    

    // DELETE data
    public function deleteData($table, $condition, $upload_folder = null, $image_database_name = null) {
        $table = $this->conn->real_escape_string($table);
        $query = "DELETE FROM $table WHERE $condition";

        // If data has images
        if ($upload_folder && $image_database_name !== null) {
            $image = $this->readDataOne($table, $condition);

            // Sanitize and validate
            $upload_folder = $this->conn->real_escape_string($upload_folder);
            $image_database_name = $this->conn->real_escape_string($image_database_name);

            // Delete
            if ($image && isset($image[$image_database_name])) {
                $imagePath = $upload_folder . $image[$image_database_name];
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }

        // Execute 
        $result = $this->conn->query($query);

        // Return
        return $result === TRUE;
    }

    public function deleteSelected($table, $post, $imgFolder = null, $imgField = null){
        if($post == null) return false;

        foreach($post as $id){
            $checked = $this->readDataOne($table, "id='$id' ");

            if ($imgField && $imgFolder) {
                unlink($imgFolder.$checked[$imgField]);
            }
    
            $delete = "DELETE FROM {$table} WHERE id = ?";
            $del = $this->conn->prepare($delete);
            $del->bind_param("i", $id);
            $del->execute();
        }
        return true;
    }

}

?>