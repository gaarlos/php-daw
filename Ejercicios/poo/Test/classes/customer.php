<?php
  class Customer {
    private $id;
    private $nombre;
    private $apellidos;
    private $correo;

    public function __construct ($id, $nom, $apes, $correo) {
      $this->id = $id;
      $this->nombre = $nom;
      $this->apellidos = $apes;
      $this->correo = $correo;
    }

    public function __toString () {
      $string="
        <style type='text/css'>
          .tg  {border-collapse:collapse;border-spacing:0;}
          .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
          .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
          .tg .tg-yw4l{vertical-align:top}
        </style>
        <table class='tg'>
          <tr>
            <th class='tg-yw4l'>$this->id</th>
            <th class='tg-yw4l'>$this->nombre</th>
            <th class='tg-yw4l'>$this->apellidos</th>
            <th class='tg-yw4l'>$this->correo</th>
          </tr>
        </table>
      ";

      return $string;
    }
  }
?>