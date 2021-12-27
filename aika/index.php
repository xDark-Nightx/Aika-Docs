<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Hightlight.js CSS -->
    <link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/styles/vs.min.css">

    <title>Aika - Documentation</title>
  </head>
  <body>
      <div class='nav-menu'>
        <nav class="navbar navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/docs/aika/">
                    <img src="/docs/aika/assets/images/documents_icon.svg" alt="" width="35" height="35" class="d-inline-block align-top">
                    <span class="ps-3" style="font-size: 15.0pt">
                        Vinhedo Digital Factory
                    </span>
                </a>
            </div>
        </nav>
        </div>
    
    <pre class='m-0 p-0'>
        <code class="language-pascal border m-0 p-0">
            type TPacketHeader = packed record
                Size: UInt16;
                Key: BYTE;
                CheckSum: BYTE;
                ClientIndex: WORD;
                Opcode: WORD;
                Time: DWORD;
            end;
        </code>
    </pre>
    <pre class='m-0 p-0'>
        <code class="language-c++ border m-0 p-0">
            typedef struct PacketHeader{
                uint16_t Size;
                uint8_t Key;
                uint8_t CheckSum;
                uint16_t ClientIndex;
                uint16_t Opcode;
                uint32_t Time;
            };
        </code>
    </pre>
    
    <div class='border' id='editorjs'>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/highlight.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/languages/delphi.min.js"></script>
    
    <script src="/docs/aika/assets/js/editor.js"></script>
    
    <script>
        hljs.highlightAll();

        const editor = new EditorJS('editorjs');
    </script>
  </body>
</html>