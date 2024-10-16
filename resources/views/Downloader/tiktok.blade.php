<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TikTok URL Downloader</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        input {
            padding: 10px;
            width: 300px;
        }
        button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .result {
            margin-top: 20px;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>

    <h1>TikTok Downloader</h1>

    <div>
        <label for="tiktok-url">Masukkan URL TikTok:</label>
        <input type="text" id="tiktok-url" placeholder="Masukkan URL TikTok" required>
        <button id="download-btn">Download</button>
    </div>

    <div class="result" id="result"></div>

    <script>
        document.getElementById('download-btn').addEventListener('click', function() {
            var tiktokUrl = document.getElementById('tiktok-url').value;
            var resultDiv = document.getElementById('result');
            resultDiv.innerHTML = ''; // Clear previous result

            if (!tiktokUrl) {
                resultDiv.innerHTML = '<p class="error">URL TikTok harus diisi.</p>';
                return;
            }

            // Kirim request ke server Laravel (TikTokDownloaderController)
            fetch('/tiktok-download', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ url: tiktokUrl })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (data.video_no_watermark) {
                    resultDiv.innerHTML = `
                        <p class="success">Video tersedia! Klik link di bawah untuk mendownload:</p>
                        <a href="${data.video_no_watermark}" target="_blank">Download Video Tanpa Watermark</a><br>
                        <p><strong>Deskripsi Video:</strong> ${data.desc}</p>
                        <img src="${data.video_origin_cover}" alt="Video Cover" style="width: 200px; height: auto;"><br>
                        <p><strong>Cover Musik:</strong> <img src="${data.music_cover}" alt="Music Cover" style="width: 100px; height: 100px;"></p>
                        <audio controls>
                            <source src="${data.music_url}" type="audio/mp3">
                            Your browser does not support the audio element.
                        </audio>
                    `;
                } else {
                    resultDiv.innerHTML = '<p class="error">Gagal mendapatkan video dari URL TikTok. Coba lagi.</p>';
                }
            })
            .catch(error => {
                resultDiv.innerHTML = `<p class="error">Terjadi kesalahan: ${error.message}</p>`;
            });
        });
    </script>

</body>
</html>
