import os
import time
from datetime import datetime

# 👇 Replace this with the actual full file path
file_path = r"E:\data backup\mia\Snapchat-2084572522.jpg"  # ← UPDATE THIS

# 👇 The target datetime
new_datetime_str = "2024-07-25 14:05:00"

def update_file_timestamp(file_path, new_datetime_str):
    try:
        dt = datetime.strptime(new_datetime_str, "%Y-%m-%d %H:%M:%S")
        timestamp = time.mktime(dt.timetuple())
        os.utime(file_path, (timestamp, timestamp))

        # Set creation time on Windows
        try:
            import ctypes
            FILE_WRITE_ATTRIBUTES = 0x100
            FILE_FLAG_BACKUP_SEMANTICS = 0x02000000

            wintime = int(timestamp * 10000000) + 116444736000000000
            ctime = ctypes.c_longlong(wintime)
            handle = ctypes.windll.kernel32.CreateFileW(
                file_path, FILE_WRITE_ATTRIBUTES, 0, None, 3,
                FILE_FLAG_BACKUP_SEMANTICS, None
            )
            ctypes.windll.kernel32.SetFileTime(handle, ctypes.byref(ctime), None, None)
            ctypes.windll.kernel32.CloseHandle(handle)
        except Exception as e:
            print(f"⚠️ Couldn't set creation time: {e}")

        print(f"✅ Updated {file_path} to {dt}")
    except Exception as e:
        print(f"❌ Error: {e}")

update_file_timestamp(file_path, new_datetime_str)
