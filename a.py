import os
import random
import sys

sys.stdout.reconfigure(encoding='utf-8')  # Đảm bảo xuất ra UTF-8

def insert_random_comment(file_path, comment="<!-- Code By Tuancute -->\n"):
    try:
        with open(file_path, 'r', encoding='utf-8') as f:
            lines = f.readlines()
        
        if not lines:
            return  # Bỏ qua tệp rỗng
        
        insert_position = random.randint(0, len(lines))  # Chọn vị trí ngẫu nhiên để chèn
        lines.insert(insert_position, comment)
        
        with open(file_path, 'w', encoding='utf-8') as f:
            f.writelines(lines)
        
        print(f"Đã chèn vào: {file_path}")
    except Exception as e:
        print(f"Lỗi khi xử lý {file_path}: {e}")

def process_files(file_paths):
    for file_path in file_paths:
        if os.path.isfile(file_path):
            insert_random_comment(file_path)

if __name__ == "__main__":
    file_paths = [
        './Bai-1.2/index.php', './Bai-2.1/index.php', './Bai-2.2/index.php', './Bai-2.3/index.php',
        './Bai-2.4/index.php', './Bai-2.5/index.php', './Bai-2.6/index.php', './Bai-2.7/index.php',
        './Bai-2.8/index.php', './Bai-2.9/index.php', './Bai-2.10/index.php', './Bai-2.11/index.php',
        './Bai-2.12/index.php', './Bai-2.13/index.php', './Bai-2.14/index.php', './Bai-2.15/index.php',
        './Bai-2.16/index.php', './Bai-2.20/index.php', './Bai-3.1/index.php'
    ]
    process_files(file_paths)
    print("Hoàn thành!")
