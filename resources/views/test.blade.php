<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Image Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }
        #image {
            margin-top: 20px;
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>AI Image Generator</h1>
    <input type="text" id="prompt" placeholder="Enter your prompt here" />
    <button id="generate">Generate Image</button>
    <div id="result"></div>
    <img id="image" alt="Generated Image" />

    <script>
        document.getElementById('generate').addEventListener('click', async () => {
            const prompt = document.getElementById('prompt').value;
            const apiKey = '0000000000';  // Replace with your API key

            const payload = {
                prompt: prompt,
                width: 1024,
                height: 1024,
                num_images: 1,
                seed: null,
                cfg_scale: 7.5,
                steps: 25,
                model: "ICBINP - I Can't Believe It's Not Photography"  // Change model as needed
            };

            try {
                const response = await fetch('https://stablehorde.net/v2/generate/async', {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${apiKey}`,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });

                if (response.ok) {
                    const data = await response.json();
					console.log(data);
                    const imageUrl = data.image_url;
                    document.getElementById('result').textContent = 'Image generated successfully!';
                    document.getElementById('image').src = imageUrl;
                } else {
                    const errorData = await response.json();
                    document.getElementById('result').textContent = `Error result: ${errorData.message}`;
                }
            } catch (error) {
                document.getElementById('result').textContent = `Error cat: ${error.message}`;
            }
        });
    </script>
</body>
</html>
