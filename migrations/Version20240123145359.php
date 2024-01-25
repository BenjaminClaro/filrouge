<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240123145359 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DC6EE5C49');
        $this->addSql('DROP INDEX IDX_6EEAA67DC6EE5C49 ON commande');
        $this->addSql('ALTER TABLE commande CHANGE id_utilisateur id_utilisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DC6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67DC6EE5C49 ON commande (id_utilisateur_id)');
        $this->addSql('ALTER TABLE detail DROP FOREIGN KEY FK_2E067F939A01C10');
        $this->addSql('ALTER TABLE detail DROP FOREIGN KEY FK_2E067F939AF8E3A3');
        $this->addSql('DROP INDEX IDX_2E067F939A01C10 ON detail');
        $this->addSql('DROP INDEX IDX_2E067F939AF8E3A3 ON detail');
        $this->addSql('ALTER TABLE detail ADD id_commande_id INT NOT NULL, ADD id_plat_id INT NOT NULL, DROP id_commande, DROP id_plat');
        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F939A01C10 FOREIGN KEY (id_plat_id) REFERENCES plat (id)');
        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F939AF8E3A3 FOREIGN KEY (id_commande_id) REFERENCES commande (id)');
        $this->addSql('CREATE INDEX IDX_2E067F939A01C10 ON detail (id_plat_id)');
        $this->addSql('CREATE INDEX IDX_2E067F939AF8E3A3 ON detail (id_commande_id)');
        $this->addSql('ALTER TABLE plat CHANGE id_categorie_id id_categorie_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DC6EE5C49');
        $this->addSql('DROP INDEX IDX_6EEAA67DC6EE5C49 ON commande');
        $this->addSql('ALTER TABLE commande CHANGE id_utilisateur_id id_utilisateur INT NOT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DC6EE5C49 FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67DC6EE5C49 ON commande (id_utilisateur)');
        $this->addSql('ALTER TABLE detail DROP FOREIGN KEY FK_2E067F939AF8E3A3');
        $this->addSql('ALTER TABLE detail DROP FOREIGN KEY FK_2E067F939A01C10');
        $this->addSql('DROP INDEX IDX_2E067F939AF8E3A3 ON detail');
        $this->addSql('DROP INDEX IDX_2E067F939A01C10 ON detail');
        $this->addSql('ALTER TABLE detail ADD id_commande INT NOT NULL, ADD id_plat INT NOT NULL, DROP id_commande_id, DROP id_plat_id');
        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F939AF8E3A3 FOREIGN KEY (id_commande) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F939A01C10 FOREIGN KEY (id_plat) REFERENCES plat (id)');
        $this->addSql('CREATE INDEX IDX_2E067F939AF8E3A3 ON detail (id_commande)');
        $this->addSql('CREATE INDEX IDX_2E067F939A01C10 ON detail (id_plat)');
        $this->addSql('ALTER TABLE plat CHANGE id_categorie_id id_categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie CHANGE id id INT NOT NULL');
    }
}
