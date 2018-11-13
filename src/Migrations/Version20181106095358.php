<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181106095358 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE etudiant CHANGE date_naiss date_naiss DATE DEFAULT NULL, CHANGE rue rue VARCHAR(20) DEFAULT NULL, CHANGE copos copos VARCHAR(50) DEFAULT NULL, CHANGE surnom surnom VARCHAR(20) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE etudiant CHANGE copos copos VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE date_naiss date_naiss DATE NOT NULL, CHANGE surnom surnom VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE rue rue VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
