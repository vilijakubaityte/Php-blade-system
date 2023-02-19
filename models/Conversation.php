<?php

namespace models;
use helper\DB;
use PDO;

class Conversation
{
    private ?int $id;
    private ?int $customer_id;
    private ?string $date;
    private ?string $conversation;

    /**
     * @param int|null $id
     * @param string|null $customer_id
     * @param string|null $date
     * @param string|null $conversation
     */
    public function __construct(?string $date, ?string $conversation, ?int $customer_id, ?int $id = null)
    {
        $this->id = $id;
        $this->customer_id = $customer_id;
        $this->date = $date;
        $this->conversation = $conversation;
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
     * @return int|null
     */
    public function getCustomerId(): ?string
    {
        return $this->customer_id;
    }

    /**
     * @param int|null $customer_id
     */
    public function setCustomerId(?string $customer_id): void
    {
        $this->customer_id = $customer_id;
    }

    /**
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * @param string|null $date
     */
    public function setDate(?string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string|null
     */
    public function getConversation(): ?string
    {
        return $this->conversation;
    }




    /**
     * @param string|null $conversation
     */
    public function setConversation(?string $conversation): void
    {
        $this->conversation = $conversation;
    }

    /**
     * @param $customer_id
     * @return array
     */
    public static function all($customer_id = null): array
    {
        $pdo = DB::getDB();
        if ($customer_id == null) {
            $stm = $pdo->prepare("SELECT * FROM contact_information ORDER BY name");
            $stm->execute([]);
        } else {
            $stm = $pdo->prepare("SELECT * FROM contact_information WHERE customer_id=? ORDER BY name");
            $stm->execute([$customer_id]);
        }
        $result = [];
        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $conversation) {
            $result[] = new Customer ($conversation['date'], $conversation['conversation']);
        }
        return $result;
    }


    /**
     * @param int $id
     * @return Conversation
     */
    public static function get(int $id): Conversation
    {
        $pdo = DB::getDB();
        $stm = $pdo->prepare("SELECT * FROM contact_information WHERE id=?");
        $stm->execute([$id]);
        $conversation = $stm->fetchAll(PDO::FETCH_ASSOC);
            return new Conversation($conversation['date'], $conversation['conversation']);
    }
}

