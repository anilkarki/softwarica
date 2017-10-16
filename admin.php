<?php
require_once "Connection.php";
class admin
{   private $id;
    private $busno;
    private $bustype;
    private $ticketprice;
    private $busroute;
    private $seatno;
    private $deptime;
    

    private $aid;
    private $username;
    private $password;

    private $c_id;
    private $event;
    private $event_date;
    private $status;
    private $holiday;


    private $connect;

    function __construct()
    {
        $this->connect = new Connection();
    }

    /* getters */
    public function getId()
    {
        return $this->Id;
    }
    public function getBusno()
    {
        return $this->busno;
    }
    public function getBustype()
    {
        return $this->bustype;
    }

    public function getTicketprice()
    {
        return $this->ticketprice;
    }

    public function getBusroute()
    {
        return $this->busroute;
    }
    public function getSeatno()
    {
        return $this->seatno;
    }
    public function getDeptime()
    {
        return $this->deptime;
    }




     public function getAid()
    {
        return $this->aid;
    }
     public function getUsername()
    {
        return $this->username;
    }
     public function getPassword()
    {
        return $this->password;
    }
    


    public function getC_id()
    {
        return $this->c_id;
    }

     public function getEvent()
    {
        return $this->event;
    }
     public function getEventdate()
    {
        return $this->event_date;
    }
     public function getStatus()
    {
        return $this->status;
    }

     public function getDay()
    {
        return $this->holiday;
    }


    /* setters */
     public function setId($id)
    {
        $this->Id = $id;
    }
    public function setBusno($busno)
    {
        $this->busno = $busno;
    }

    public function setBustype($bustype)
    {
        $this->bustype= $bustype;
    }

    public function setTicketprice($ticketprice)
    {
        $this->ticketprice = $ticketprice;
    }

    public function setBusroute($busroute)
    {
        $this->busroute = $busroute;
    }

      public function setSeatno($seatno)
    {
        $this->seatno = $seatno;
    }

      public function setDeptime($deptime)
    {
        $this->deptime = $deptime;
    }

   
      public function setAid($aid)
    {
        $this->aid = $aid;
    }
      public function setUsername($username)
    {
        $this->username = $username;
    }
      public function setPassword($password)
    {
        $this->password = $password;
    }


      public function setC_id($c_id)
    {
        $this->c_id = $c_id;
    }

    public function setEvent($event)
    {
        $this->event = $event;
    }
      public function setEventdate($event_date)
    {
        $this->event_date = $event_date;
    }
      public function setStatus($status)
    {
        $this->status = $status;
    }
      public function setDay($holiday)
    {
        $this->holiday = $holiday;
    }


    public function AddBus()
    {
          $sql = "INSERT INTO bus VALUES
 ('$this->busno','$this->bustype','$this->busroute','$this->ticketprice','$this->deptime')";
          return $this->connect->ud($sql);
    }

function selectRowBus($busno)
{
$dt = $this->connect->getData("SELECT * FROM bus
WHERE busno='$busno'");
$this->setBustype($dt[0]['bustype']);
$this->setBusroute($dt[0]['busroute']);
$this->setTicketprice($dt[0]['ticketprice']);


}

public function UpdateBus($busno)
{
$sql = "UPDATE bus SET bustype='$this->bustype', busroute='$this->busroute',ticketprice='$this->ticketprice',deptime='$this->deptime'

        WHERE busno='$busno'";
return $this->connect->ud($sql);
}

public function DeleteBus($busno)
{
$sql = "DELETE FROM bus WHERE busno='$busno'";
return $this->connect->ud($sql);
}

function selectBus()
{
    return $this->connect->getData("SELECT * FROM bus");
}

function selectBusb($busno)
{
$dt = $this->connect->getData("SELECT * FROM bus
WHERE busno='$busno'");
$this->setBusno($dt[0]['busno']);
$this->setBustype($dt[0]['bustype']);
$this->setBusroute($dt[0]['busroute']);
$this->setTicketprice($dt[0]['ticketprice']);
$this->setDeptime($dt[0]['deptime']);
}


function logIn1()
{
$ak = $this->connect->getData("SELECT * FROM admin
WHERE username='$this->username' and 
password='$this->password'");

if(count($ak) == 1 )
{
session_start();
$_SESSION['acc-admin'] = $ak[0]['username'];
//$_SESSION['name'] = $ak[0]['firstname'];
}
else
        {
            die('<script>alert("wrong id or pw")</script>');
        }
        return true;
}

 public function AddCalendar()
    {
          $sql = "INSERT INTO calendar VALUES
 ('','$this->event','$this->event_date','$this->status',
'$this->holiday')";
          return $this->connect->ud($sql);
    }




}
?>