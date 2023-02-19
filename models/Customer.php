<?php

namespace models;
use helper\DB;
use PDO;
class Customer
{
    private ?int $id;
    private ?string $name;
    private ?string $surname;
    private ?string $phone;
    private ?string $email;
    private ?string $address;
    private ?string $position;
    private ?int $company_id;


    /**
     * @param int|null $id
     * @param string|null $name
     * @param string|null $surname
     * @param string|null $phone
     * @param string|null $email
     * @param string|null $address
     * @param string|null $position
     * @param int|null $company_id
     */
    public function __construct(?string $name, ?string $surname, ?string $phone, ?string $email, ?string $address, ?string $position, ?int $company_id, ?int $id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
        $this->position = $position;
        $this->company_id = $company_id;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @param string|null $surname
     */
    public function setSurname(?string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     */
    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string|null
     */
    public function getPosition(): ?string
    {
        return $this->position;
    }

    /**
     * @param string|null $position
     */
    public function setPosition(?string $position): void
    {
        $this->position = $position;
    }

    /**
     * @return int|null
     */
    public function getCompanyId(): ?string
    {
        return $this->company_id;
    }

    /**
     * @param int|null $company_id
     */
    public function setCompanyId(?string $company_id): void
    {
        $this->company_id = $company_id;
    }


//    /**
//     * @return void
//     */
//    public function save()
//    {
//        $pdo = DB::getDB();
//        if ($this->id === null) {
//            $stm = $pdo->prepare("INSERT INTO customers (name, surname, phone, email, address, position) VALUES (?, ?, ?, ?, ?, ?)");
//            $stm->execute([$this->name, $this->surname, $this->phone, $this->email, $this->address, $this->position]);
//        } else {
//            $stm = $pdo->prepare("UPDATE customers SET name=?, surname=?, phone=?, email=?, address=?, position=? WHERE id=?");
//        }
//    }

    /**
     * Paimamos visos kategorijos ir sugražinamas jų masyvas
     * @return Customer[]
     */
    public static function all($company_id=null):array{
        $pdo=DB::getDB();
        if ($company_id==null) {
            $stm = $pdo->prepare("SELECT * FROM customers ORDER BY name");
            $stm->execute([]);
        }else{
            $stm = $pdo->prepare("SELECT * FROM customers WHERE company_id=? ORDER BY name");
            $stm->execute([$company_id]);
        }
        $result=[];
        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $customer){
            $result[]=new Customer ($customer['name'], $customer['surname'], $customer['phone'], $customer['email'], $customer['address'], $customer['position'], $customer['company_id'], $customer['id']);
        }
        return $result;
    }



}
