<?php

require_once("controller/AppMenu.php");

?>

<!doctype html>
<html lang="en">
    <head>
        <?php
        
        require_once("view/index.header.php");

        ?>
    </head>
    <body>
        <div class='nav-menu'>
            <?php
            
            require_once("view/index.navmenu.php");

            ?>
        </div>

        <div class='page-content row m-0 m-0'>
            <div class='col-md-3 col-lg-2 p-1'>
                <div class='border w-100 h-100'>
                    <?
                    
                    $appMenu = new Aika\Controller\AppMenu();
                    $appMenu->Render();

                    ?>
                    <div class="menu-category p-0 m-0">
                        <a id="menu_category_collapsable_1" class="border shadow-sm text-decoration-none w-100 p-0 m-0" data-bs-toggle="collapse" href="#menuCategoryId_1" type="button" aria-expanded="true">
                            <div data-target-id="2" class="text-dark p-3">
                                <i class="bi bi-box pe-2" style="width: 1em; height: 1em;"></i>
                                Types
                            </div>
                        </a>
                        <div data-target-id="1" class="border px-2 py-2 digital-collapsable-element collapse show" id="menuCategoryId_1" style="">
                            <div class="digital-menu-item p-0 m-0">
                                <a class="text-decoration-none w-100 p-0 m-0" href="/DigitalFactory/?moduleId=1&amp;menuItemId=3" type="button">
                                    <div class="py-2 px-2">
                                        <div class="py-1 ps-3 px-1 text-dark rounded" style="">
                                            <i class="bi bi-bezier2 pe-2" style="padding-top: 5px"></i>
                                            <span style="font-size:11.0pt!important;">PacketHeader</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="digital-menu-item p-0 m-0">
                                <button class='btn py-0 w-100 text-small'>
                                    <i class="bi bi bi-plus-lg text-success" style="width: 1em; height: 1em;"></i>
                                    Adicionar
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="menu-category p-0 m-0">
                        <a id="menu_category_collapsable_2" class="border shadow-sm text-decoration-none w-100 p-0 m-0" data-bs-toggle="collapse" href="#menuCategoryId_2" type="button" aria-expanded="true">
                            <div data-target-id="2" class="text-dark p-3">
                                <i class="bi bi-diagram-2 pe-2" style="width: 1em; height: 1em;"></i>
                                Packets
                            </div>
                        </a>
                        <div data-target-id="2" class="border px-2 py-2 digital-collapsable-element collapse show" id="menuCategoryId_2" style="">
                            <div class="digital-menu-item p-0 m-0">
                                <a class="text-decoration-none w-100 p-0 m-0" href="/DigitalFactory/?moduleId=1&amp;menuItemId=3" type="button">
                                    <div class="py-2 px-2">
                                        <div class="py-1 ps-3 px-1 text-dark rounded" style="">
                                            <i class="bi bi-boxes pe-2" style="padding-top: 5px"></i>
                                            <span style="font-size:11.0pt!important;">0925 - SendToWorld</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="digital-menu-item p-0 m-0">
                                <button class='btn py-0 w-100 text-small'>
                                    <i class="bi bi bi-plus-lg text-success" style="width: 1em; height: 1em;"></i>
                                    Adicionar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-md-9 col-lg-10'>
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
            </div>
        </div>
        
        <?php
            
            require_once("view/index.footer.php");

        ?>
    </body>
</html>