<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::unprepared('CREATE TRIGGER update_saldo_dompet AFTER INSERT ON `topup` FOR EACH ROW
            BEGIN
                INSERT INTO dompet
                        SET id = NEW.dompet_id,
                            saldo = NEW.saldo,
                            bonus = NEW.bonus
                        ON DUPLICATE KEY UPDATE
                            saldo = saldo + NEW.saldo,
                            bonus = bonus + NEW.bonus;
            END
        ');

        DB::unprepared('CREATE TRIGGER tambah_saldo_user BEFORE INSERT ON `users` FOR EACH ROW
            BEGIN
                IF NEW.id IS NOT NULL THEN
                    INSERT INTO dompet (saldo, bonus) VALUES (10000, 1);  -- Perbaikan di sini, tanpa tanda backtick

                    SET @dompet_id = LAST_INSERT_ID();

                    SET NEW.dompet_id = @dompet_id;
                END IF;
            END
        ');

        DB::unprepared('CREATE TRIGGER create_item_kurir AFTER INSERT ON `users` FOR EACH ROW
            BEGIN
                IF NEW.level IN ("kurir")  -- Perbaikan di sini, menggunakan tanda kutip
                THEN
                    INSERT INTO kurir (nama_kurir) VALUES (NEW.fullname);
                END IF;
            END
        ');

        DB::unprepared('CREATE TRIGGER potong_saldo AFTER INSERT ON `pembayaran` FOR EACH ROW
            BEGIN
                IF NEW.metode IN ("dompetku")  -- Perbaikan di sini, menggunakan tanda kutip
                THEN
                    UPDATE dompet
                    SET saldo = saldo - NEW.harga_total
                    WHERE id = NEW.id;
                END IF;
            END
        ');
    }

    public function down(): void
    {
        DB::unprepared('DROP TRIGGER "update_saldo_dompet, tambah_user_dompet, create_item_kurir, potong_saldo"');
    }
};
