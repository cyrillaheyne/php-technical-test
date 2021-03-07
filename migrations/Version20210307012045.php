<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210307012045 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE running (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, type_id INT NOT NULL, start_date DATETIME NOT NULL, duration INT NOT NULL, distance DOUBLE PRECISION NOT NULL, comment LONGTEXT DEFAULT NULL, average_speed DOUBLE PRECISION NOT NULL, average_pace DOUBLE PRECISION NOT NULL, INDEX IDX_2F21896FA76ED395 (user_id), INDEX IDX_2F21896FC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE running_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE running ADD CONSTRAINT FK_2F21896FA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE running ADD CONSTRAINT FK_2F21896FC54C8C93 FOREIGN KEY (type_id) REFERENCES running_type (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE running DROP FOREIGN KEY FK_2F21896FC54C8C93');
        $this->addSql('ALTER TABLE running DROP FOREIGN KEY FK_2F21896FA76ED395');
        $this->addSql('DROP TABLE running');
        $this->addSql('DROP TABLE running_type');
        $this->addSql('DROP TABLE `user`');
    }
}
