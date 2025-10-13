# Spesifikasi Keperluan Perniagaan | Business Requirements Specification (BRS)

**Sistem:** Sistem Pengurusan & Analitik Homestay Malaysia  
**Pemilik Sistem:** MOTAC, Tourism Malaysia  
**Tarikh:** 11 Oktober 2025  
**Versi:** 3.0

- [0. Ringkasan Eksekutif | Executive Summary](#0-ringkasan-eksekutif--executive-summary)
- [1. Latar Belakang & Rasional Projek | Project Background & Rationale](#11-konteks-program-homestay-motac--motac-homestay-programme-context)
- [2. Objektif Perniagaan | Business Objectives](#21-objektif-strategik--strategic-objectives)
- [3. Skop Perniagaan | Business Scope](#31-skop-dalam-sistem--in-scope)

## BAHAGIAN B: ANALISIS PERNIAGAAN | SECTION B: BUSINESS ANALYSIS

- [4. Pihak Berkepentingan | Stakeholder Analysis](#4-pihak-berkepentingan--stakeholder-analysis)
- [5. Analisis Nilai & Rasional Perniagaan | Business Value & Rationale](#5-analisis-nilai--rasional-perniagaan--business-value--rationale)
- [6. Asumsi & Kebergantungan Perniagaan | Business Assumptions & Dependencies](#6-asumsi--kebergantungan-perniagaan--business-assumptions--dependencies)

### BAHAGIAN C: PROSES & TRANSFORMASI PERNIAGAAN | SECTION C: BUSINESS PROCESS & TRANSFORMATION

- [7. Proses Perniagaan Sedia Ada | Current Business Process](#7-proses-perniagaan-sedia-ada--current-business-process)
- [8. Proses Perniagaan Baharu | To-Be Business Process](#8-proses-perniagaan-baharu--to-be-business-process)

### BAHAGIAN D: KEPERLUAN SISTEM & FUNGSI | SECTION D: SYSTEM & FUNCTIONAL REQUIREMENTS

- [9. Keperluan Fungsi Perniagaan | Functional Business Requirements](#9-keperluan-fungsi-perniagaan--functional-business-requirements)
- [10. Keperluan Bukan Fungsi | Non-Functional Business Requirements](#10-keperluan-bukan-fungsi--non-functional-business-requirements)
- [11. Keperluan Pelaporan | Reporting & Analytics Requirements](#11-keperluan-pelaporan--reporting--analytics-requirements)

### BAHAGIAN E: KRITERIA KEJAYAAN | SECTION E: SUCCESS CRITERIA

- [12. Kriteria Kejayaan Perniagaan | Business Success Criteria](#12-kriteria-kejayaan-perniagaan--business-success-criteria)
- [13. Anggaran Faedah | Expected Business Benefits](#13-anggaran-faedah--expected-business-benefits)
- [14. Kriteria Penerimaan Perniagaan | Business Acceptance Criteria](#14-kriteria-penerimaan-perniagaan--business-acceptance-criteria)

### BAHAGIAN F: PELAKSANAAN & PENGURUSAN PROJEK | SECTION F: PROJECT IMPLEMENTATION & MANAGEMENT

- [15. Pelan Pengurusan Perubahan Perniagaan | Business Change Management Plan](#15-pelan-pengurusan-perubahan-perniagaan--business-change-management-plan)
- [16. Keperluan Pemantauan & Penilaian Prestasi | Performance Monitoring Requirements](#16-keperluan-pemantauan--penilaian-prestasi--performance-monitoring-requirements)
- [17. Risiko & Andaian Perniagaan | Business Risks & Assumptions](#17-risiko--andaian-perniagaan--business-risks--assumptions)
- [18. Pelan Latihan & Penerimaan | Training & Adoption Plan](#18-pelan-latihan--penerimaan--training--adoption-plan)

### BAHAGIAN G: PEMATUHAN & MASA DEPAN SISTEM | SECTION G: SYSTEM COMPLIANCE & FUTURE

- [19. Keperluan Keselamatan & Pematuhan | Compliance & Data Governance](#19-keperluan-keselamatan--pematuhan--compliance--data-governance)
- [20. Keperluan Skalabiliti & Pengembangan Masa Depan | Future Scalability & Business Expansion Needs](#20-keperluan-skalabiliti--pengembangan-masa-depan--future-scalability--business-expansion-needs)
- [21. Garis Masa & Fasa Pelaksanaan | Project Timeline & Phases](#21-garis-masa--fasa-pelaksanaan--project-timeline--phases)

### BAHAGIAN H: LAMPIRAN & RUJUKAN | SECTION H: APPENDICES & REFERENCES

- [22. Lampiran Tambahan | Supporting Documents](#22-lampiran-tambahan--supporting-documents)
- [23. Terminologi & Definisi | Glossary of Terms](#23-terminologi--definisi--glossary-of-terms)
- [24. Jejak Dokumen & Kawalan Versi | Document Traceability & Version Control](#24-jejak-dokumen--kawalan-versi--document-traceability--version-control)

## 0. Ringkasan Eksekutif | Executive Summary

### 0.1 Tujuan Sistem | System Purpose

Sistem Pengurusan & Analitik Homestay Malaysia adalah inisiatif digitalisasi nasional oleh MOTAC dan Tourism Malaysia untuk memodenkan pengurusan, pemantauan, dan pelaporan data Homestay. Sistem ini bertujuan untuk memusatkan data, mempercepatkan pelaporan, dan menyokong keputusan strategik berasaskan analitik.

The Homestay Malaysia Management & Analytics System is a national digitalization initiative by MOTAC and Tourism Malaysia to modernize the management, monitoring, and reporting of Homestay data. The system aims to centralize data, accelerate reporting, and support strategic decision-making based on analytics.

### 0.2 Skop & Sasaran | Scope & Objectives

**Skop Utama | Primary Scope:

- Pengurusan data 1,200+ Homestay berdaftar di seluruh Malaysia
- Automasi pelaporan bulanan dari 300+ koperasi dan pejabat negeri
- Dashboard analitik untuk MOTAC HQ, negeri, koperasi, dan pengusaha
- Integrasi dengan ekosistem pelancongan nasional Malaysia

**Primary Scope:

- Management of 1,200+ registered Homestays nationwide
- Automation of monthly reporting from 300+ cooperatives and state offices
- Analytics dashboard for MOTAC HQ, states, cooperatives, and operators
- Integration with Malaysia's national tourism ecosystem

## 0.3 Pihak Berkepentingan Utama | Primary Stakeholders

**Pengguna Utama | Primary Users:

- **MOTAC HQ** (50+ pegawai): Pengambilan keputusan strategik dan pelaporan nasional
- **Pejabat MOTAC Negeri** (300+ pegawai): Koordinasi dan pelaporan peringkat negeri
- **Koperasi Homestay** (300+ koperasi): Pengurusan kluster dan input data
- **Tourism Malaysia** (100+ pegawai): Analitik untuk promosi dan pemasaran

**Primary Users:

- **MOTAC HQ** (50+ officers): Strategic decision-making and national reporting
- **MOTAC State Offices** (300+ officers): State-level coordination and reporting
- **Homestay Cooperatives** (300+ cooperatives): Cluster management and data input
- **Tourism Malaysia** (100+ officers): Analytics for promotion and marketing

## 0.4 Impak & Faedah Dijangka | Expected Impact & Benefits

**Transformasi Operasi | Operational Transformation:

- Pengurangan masa pelaporan dari 3 minggu kepada 3 hari (90% improvement)
- Peningkatan ketepatan data dari 75% kepada 95%+ (25% improvement)
- Penjimatan 200+ jam kerja tahunan untuk pelaporan manual
- Automasi 90% proses pelaporan rutin

**Operational Transformation:

- Reduction of reporting time from 3 weeks to 3 days (90% improvement)
- Increase in data accuracy from 75% to 95%+ (25% improvement)
- Savings of 200+ annual work hours for manual reporting
- Automation of 90% routine reporting processes

**Impak Strategik | Strategic Impact:

- Sokongan kepada Malaysia Digital Economy Blueprint (MyDIGITAL)
- Sumbangan kepada sasaran RM 240 bilion industri pelancongan
- Pemberdayaan ekonomi komuniti luar bandar melalui data-driven insights
- Penambahbaikan daya saing Malaysia sebagai destinasi Homestay

**Strategic Impact:

- Support for Malaysia Digital Economy Blueprint (MyDIGITAL)
- Contribution to RM 240 billion tourism industry target
- Rural community economic empowerment through data-driven insights
- Enhancement of Malaysia's competitiveness as Homestay destination

## 0.5 Sasaran Khalayak | Target Audience

Dokumen ini disediakan untuk:

- **Pembuat Keputusan MOTAC**: Kelulusan projek dan alokasi sumber
- **Pasukan Pelaksanaan**: Panduan untuk pembangunan sistem teknikal
- **Stakeholder Operasi**: Pemahaman perubahan proses dan latihan
- **Pengaudit & Kualiti**: Pematuhan standard dan requirement traceability

This document is prepared for:

- **MOTAC Decision Makers**: Project approval and resource allocation
- **Implementation Team**: Guidance for technical system development
- **Operational Stakeholders**: Understanding of process changes and training

### 1.1 Konteks Program Homestay MOTAC | MOTAC Homestay Programme Context

Program Homestay Malaysia yang dikendalikan oleh MOTAC merupakan inisiatif strategik nasional untuk memperkasa pelancongan komuniti dan mengangkat taraf ekonomi luar bandar. Sejak penubuhan pada 1995, program ini telah berkembang menjadi salah satu produk pelancongan utama Malaysia dengan:

- **1,200+ Homestay berdaftar** di seluruh Malaysia
- **300+ koperasi** yang menguruskan kluster Homestay
- **Sumbangan ekonomi RM 50 juta** setahun kepada komuniti luar bandar
- **Keterlibatan 15,000+ ahli keluarga** dalam aktiviti pelancongan

The MOTAC Malaysia Homestay Programme is a strategic national initiative to empower community tourism and uplift rural economy. Since its establishment in 1995, this programme has evolved into one of Malaysia's key tourism products with:

- **1,200+ registered Homestays** nationwide
- **300+ cooperatives** managing Homestay clusters  
- **Economic contribution of RM 50 million** annually to rural communities
- **Involvement of 15,000+ family members** in tourism activities

### 1.2 Cabaran Sistem Sedia Ada | Current System Challenges

Pengurusan data Homestay pada masa ini bergantung sepenuhnya kepada proses manual yang tidak cekap dan berisiko tinggi:

**Proses Manual Semasa:

- Pengumpulan data bulanan melalui template Excel yang tidak diseragamkan
- Penghantaran laporan melalui e-mel dari 300+ koperasi dan pejabat negeri
- Proses validasi manual di MOTAC HQ memakan masa 2-3 minggu
- Konsolidasi data nasional dilakukan secara manual tanpa automasi
- Laporan akhir sering mengandungi data yang tidak lengkap atau ketinggalan zaman

**Implikasi Negatif:

- **Ketidakcekapan operasi**: 200+ jam kerja diperlukan untuk pelaporan bulanan
- **Risiko kehilangan data**: 15-20% laporan negeri mengalami masalah data hilang atau rosak
- **Keterlambatan pelaporan**: Laporan nasional sering lewat 4-6 minggu dari jadual
- **Ketidaktepatan data**: Anggaran 25% data mengandungi ralat disebabkan input manual
- **Kesukaran analisis**: Tiada kemampuan untuk analisis trend atau perbandingan prestasi

Current Homestay data management relies entirely on inefficient and high-risk manual processes:

**Current Manual Process:

- Monthly data collection via non-standardized Excel templates
- Report submission via email from 300+ cooperatives and state offices  
- Manual validation process at MOTAC HQ takes 2-3 weeks
- National data consolidation performed manually without automation
- Final reports often contain incomplete or outdated data

**Negative Implications:

- **Operational inefficiency**: 200+ work hours required for monthly reporting
- **Data loss risk**: 15-20% of state reports experience data loss or corruption
- **Reporting delays**: National reports often 4-6 weeks behind schedule
- **Data inaccuracy**: Estimated 25% of data contains errors due to manual input
- **Analysis difficulties**: No capability for trend analysis or performance comparison

### 1.3 Justifikasi Pemodenan | Modernization Justification

Sistem baharu ini dibangunkan untuk menyelesaikan cabaran kritikal dan menyokong transformasi digital MOTAC:

**Objektif Pemodenan:

- **Pemusatan Data**: Semua data Homestay disimpan dalam pangkalan data berpusat yang boleh diakses masa nyata
- **Automasi Proses**: Menggantikan proses manual dengan workflow digital yang cekap
- **Analitik Lanjutan**: Menyediakan dashboard dan laporan analitik untuk keputusan strategik
- **Piawai Kualiti**: Memastikan ketepatan dan konsistensi data melalui validasi automatik
- **Kecekapan Operasi**: Mengurangkan masa pelaporan dari minggu kepada hari

**Faedah Jangka Panjang:

- Sokongan kepada Dasar Pelancongan Nasional Malaysia
- Penambahbaikan daya saing industri Homestay
- Peningkatan kualiti perkhidmatan dan pengalaman pelancong
- Kemudahan akses data untuk penyelidikan dan pembangunan dasar

This new system is developed to resolve critical challenges and support MOTAC's digital transformation:

**Modernization Objectives:

- **Data Centralization**: All Homestay data stored in centralized database with real-time access
- **Process Automation**: Replace manual processes with efficient digital workflows
- **Advanced Analytics**: Provide dashboards and analytical reports for strategic decisions
- **Quality Standards**: Ensure data accuracy and consistency through automatic validation  
- **Operational Efficiency**: Reduce reporting time from weeks to days

**Long-term Benefits:

- Support for Malaysia National Tourism Policy
- Improvement of Homestay industry competitiveness
- Enhancement of service quality and tourist experience
- Facilitated data access for research and policy development

### 2.1 Objektif Strategik | Strategic Objectives

#### OS-01: Transformasi Digital MOTAC

#### OS-02: Peningkatan Daya Saing Industri

#### OS-03: Pemberdayaan Komuniti Luar Bandar

#### OS-01: MOTAC Digital Transformation

#### OS-02: Industry Competitiveness Enhancement

#### OS-03: Rural Community Empowerment

### 2.2 Objektif Operasi & Sasaran Terukur | Operational Objectives & Measurable Goals

#### OO-01: Kecekapan Pelaporan | Reporting Efficiency

#### OO-02: Kualiti Data | Data Quality

#### OO-03: Penerimaan Pengguna | User Adoption

#### OO-04: Ketersediaan Sistem | System Availability

#### OO-01: Reporting Efficiency

#### OO-02: Data Quality

#### OO-03: User Adoption

#### OO-04: System Availability

### 2.3 Penyelarasan Strategik | Strategic Alignment

**Dasar Pelancongan Nasional:

- Menyokong objektif peningkatan ketibaan pelancong domestik sebanyak 15% menjelang 2030.
- Membantu pencapaian sasaran sumbangan ekonomi pelancongan sebanyak RM 240 bilion.
- Menyokong agenda pembangunan lestari melalui pelancongan komuniti.

**Transformasi Digital Malaysia:

- Selaras dengan Malaysia Digital Economy Blueprint (MyDIGITAL).
- Menyokong inisiatif Government-to-Business (G2B) digital services.
- Membantu pencapaian Malaysia sebagai hub pelancongan digital di rantau ini.

**National Tourism Policy:

- Support objective of 15% increase in domestic tourist arrivals by 2030.
- Help achieve tourism economic contribution target of RM 240 billion.
- Support sustainable development agenda through community tourism.

**Malaysia Digital Transformation:

- Aligned with Malaysia Digital Economy Blueprint (MyDIGITAL).
- Support Government-to-Business (G2B) digital services initiative.

## BAHAGIAN B: SKOP & ANALISIS PERNIAGAAN | SECTION B: BUSINESS SCOPE & ANALYSIS

### 3.1 Skop Dalam Sistem | In-Scope

**Pengurusan Data Homestay:

- Import, validasi, dan pengurusan data Homestay, koperasi, negeri, dan prestasi.
- Pengemaskinian data profil, kapasiti, dan maklumat operasi Homestay.
- Pengurusan data keanggotaan koperasi dan struktur pengurusan kluster.
- Penyimpanan sejarah prestasi bulanan dan tahunan Homestay.

**Platform Analitik & Pelaporan:

- Dashboard analitik interaktif untuk semua peringkat (nasional, negeri, koperasi, Homestay).
- Sistem pelaporan automatik dengan template yang diseragamkan.
- Eksport data dan laporan dalam format Excel, PDF, dan CSV.
- Visualisasi data melalui carta, graf, peta, dan jadual analitik.

**Pengurusan Sistem:

- Pengurusan pengguna dengan kawalan akses berasaskan peranan (admin, penganalisis, pemerhati).
- Sistem audit trail untuk rekod perubahan data dan aktiviti pengguna.
- Penjadualan laporan automatik dan notifikasi kepada pengguna.
- Sistem backup dan pemulihan data untuk keselamatan maklumat.

**Homestay Data Management:

- Import, validation, and management of Homestay, cooperative, state, and performance data.
- Update of Homestay profile data, capacity, and operational information.
- Management of cooperative membership data and cluster management structure.
- Storage of monthly and annual Homestay performance history.

**Analytics & Reporting Platform:

- Interactive analytics dashboard for all levels (national, state, cooperative, Homestay).
- Automatic reporting system with standardized templates.
- Data and report export in Excel, PDF, and CSV formats.
- Data visualization through charts, graphs, maps, and analytical tables.

**System Management:

- User management with role-based access control (admin, analyst, viewer).
- Audit trail system for data change records and user activity.
- Automatic report scheduling and user notifications.
- Data backup and recovery system for information security.

### 3.2 Skop Luar Sistem | Out-of-Scope

**Modul Kewangan & Perakaunan:

- Modul kewangan, perakaunan, dan pengurusan pembayaran tidak termasuk dalam sistem ini.
- Sistem tidak menguruskan transaksi kewangan antara Homestay dan pelancong.
- Pengurusan yuran keahlian koperasi tidak termasuk dalam skop projek.

**Platform Tempahan & E-commerce:

- Platform tempahan Homestay untuk pelancong tidak termasuk dalam sistem.
- Integrasi dengan portal tempahan dalam talian pihak ketiga tidak disediakan.
- Sistem pembayaran dalam talian (payment gateway) tidak termasuk.

**Pengurusan Operasi Harian:

- Sistem pengurusan check-in/check-out pelancong tidak termasuk.
- Pengurusan inventori dan kemudahan Homestay tidak dalam skop.
- Sistem komunikasi langsung dengan pelancong tidak disediakan.

**Financial & Accounting Modules:

- Financial, accounting, and payment management modules not included in this system.
- System does not manage financial transactions between Homestay and tourists.
- Cooperative membership fee management not included in project scope.

**Booking & E-commerce Platform:

- Homestay booking platform for tourists not included in the system.
- Integration with third-party online booking portals not provided.
- Online payment system (payment gateway) not included.

**Daily Operations Management:

- Tourist check-in/check-out management system not included.
- Homestay inventory and facilities management not in scope.
- Direct communication system with tourists not provided.

### 3.3 Entiti & Pihak Terjejas | Affected Entities & Stakeholders

**Pengguna Utama | Primary Users:

- **MOTAC HQ** (50+ pegawai): Akses penuh kepada analytics nasional dan pelaporan strategik
- **Pejabat MOTAC Negeri** (300+ pegawai): Input data negeri dan akses kepada dashboard negeri
- **Koperasi Homestay** (300+ koperasi): Input data koperasi dan akses kepada laporan kluster
- **Pengusaha Homestay** (1,200+ operator): Akses terhad kepada data prestasi individu

**Pengguna Sekunder | Secondary Users:

- **Tourism Malaysia** (100+ pegawai): Akses kepada data analitik untuk promosi dan pemasaran
- **Pasukan IT/DevOps** (10+ teknisi): Pengurusan sistem, sokongan teknikal, dan penyelenggaraan
- **Pegawai Audit** (20+ auditor): Akses kepada audit trail dan rekod untuk pematuhan

**Benefisiari Tidak Langsung | Indirect Beneficiaries:

- **Pelancong domestik**: Manfaat daripada peningkatan kualiti perkhidmatan Homestay
- **Komuniti luar bandar**: Peningkatan pendapatan melalui pengurusan Homestay yang lebih baik
- **Institusi penyelidikan**: Akses kepada data untuk kajian pelancongan dan pembangunan

**Primary Users:

- **MOTAC HQ** (50+ officers): Full access to national analytics and strategic reporting
- **MOTAC State Offices** (300+ officers): State data input and access to state dashboards
- **Homestay Cooperatives** (300+ cooperatives): Cooperative data input and cluster report access
- **Homestay Operators** (1,200+ operators): Limited access to individual performance data

**Secondary Users:

- **Tourism Malaysia** (100+ officers): Access to analytics data for promotion and marketing
- **IT/DevOps Team** (10+ technicians): System management, technical support, and maintenance
- **Audit Officers** (20+ auditors): Access to audit trail and records for compliance

**Indirect Beneficiaries:

- **Domestic tourists**: Benefits from improved Homestay service quality
- **Rural communities**: Income enhancement through better Homestay management
- **Research institutions**: Data access for tourism and development studies

### 3.4 Batasan Geografi & Operasi | Geographic & Operational Boundaries

**Cakupan Geografi:

- Sistem meliputi semua 13 negeri dan 3 wilayah persekutuan di Malaysia
- Fokus kepada Homestay yang berdaftar secara rasmi dengan MOTAC
- Termasuk Homestay di kawasan luar bandar, pinggir bandar, dan bandar kecil

**Batasan Operasi:

- Sistem beroperasi dalam waktu pejabat (8:00 AM - 6:00 PM) untuk sokongan pengguna
- Akses sistem tersedia 24/7 untuk fungsi kritikal HQ dan negeri
- Sokongan teknikal tersedia dalam Bahasa Malaysia dan Bahasa Inggeris

**Geographic Coverage:

- System covers all 13 states and 3 federal territories in Malaysia
- Focus on Homestays officially registered with MOTAC  
- Includes Homestays in rural, suburban, and small town areas

**Operational Boundaries:

- System operates during office hours (8:00 AM - 6:00 PM) for user support
- System access available 24/7 for critical HQ and state functions
- Technical support available in Bahasa Malaysia and English

---

## BAHAGIAN B: ANALISIS PERNIAGAAN & STAKEHOLDER | SECTION B: BUSINESS ANALYSIS & STAKEHOLDER

## 4. Pihak Berkepentingan | Stakeholder Analysis

### 4.1 Matriks Pihak Berkepentingan | Stakeholder Matrix

| Pihak Berkepentingan | Peranan / Role | Tanggungjawab / Responsibility | Tahap Keterlibatan / Involvement Level | Kepentingan / Interest | Kuasa / Power |
|---------------------|----------------|--------------------------------|----------------------------------------|----------------------|---------------|
| **MOTAC HQ** | Pemilik sistem dan pembuat dasar | Menyelia keseluruhan operasi, membuat keputusan strategik, dan memantau prestasi nasional | Tinggi - Pengguna harian, pembuat keputusan utama | Sangat tinggi - Pencapaian objektif pelancongan nasional | Tinggi - Autoriti membuat keputusan dan perubahan |
| **Tourism Malaysia** | Pengguna data dan agensi promosi | Menggunakan data untuk promosi, pemasaran, dan analisis trend pelancongan | Sederhana - Pengguna data untuk keperluan promosi | Tinggi - Data akurat untuk promosi berkesan | Sederhana - Pengaruh dalam strategi pemasaran |
| **Pejabat MOTAC Negeri** | Penyedia data dan koordinator negeri | Input data bulanan, validasi maklumat negeri, dan komunikasi dengan koperasi | Tinggi - Input data rutin dan pengurusan operasi negeri | Tinggi - Kecekapan operasi dan pelaporan yang tepat | Sederhana - Pengaruh dalam pelaksanaan negeri |
| **Koperasi Homestay** | Pengurusan kluster dan input data | Mengumpul data dari Homestay, menguruskan kluster, dan memastikan kualiti data | Tinggi - Input data koperasi dan pengurusan ahli | Tinggi - Peningkatan pengurusan dan prestasi kluster | Rendah - Terhad kepada operasi koperasi |
| **Pengusaha Homestay** | Sumber data utama dan benefisiari | Menyediakan data prestasi, menerima panduan, dan melaksanakan penambahbaikan | Sederhana - Penyedia data dan penerima manfaat | Sederhana - Peningkatan prestasi dan pendapatan | Rendah - Pengaruh terhad kepada operasi individu |
| **Pasukan IT/DevOps** | Pelaksana teknikal dan sokongan | Membangun, menyelenggara, dan menyokong infrastruktur sistem | Tinggi - Pembangunan dan penyelenggaraan harian | Sederhana - Kejayaan teknikal projek | Sederhana - Kawalan teknikal dan pelaksanaan |
| **Pegawai Audit & Kualiti** | Pematuhan dan jaminan kualiti | Memastikan pematuhan piawaian, audit data, dan kawalan kualiti | Rendah - Aktiviti berkala audit dan semakan | Tinggi - Pematuhan dan integriti data | Sederhana - Kuasa veto untuk isu pematuhan |
| **Vendor Teknologi** | Pembekal penyelesaian teknikal | Menyediakan platform, sokongan teknikal, dan penyelenggaraan sistem | Sederhana - Sokongan teknikal dan penyelenggaraan | Sederhana - Kejayaan kontrak dan prestasi sistem | Rendah - Terhad kepada penghantaran teknikal |

### 4.2 Analisis Pengaruh & Kepentingan | Influence & Interest Analysis

#### Kuadran 1: Tinggi Pengaruh, Tinggi Kepentingan (Manage Closely)

#### Kuadran 2: Tinggi Pengaruh, Rendah Kepentingan (Keep Satisfied)

#### Kuadran 3: Rendah Pengaruh, Tinggi Kepentingan (Keep Informed)

#### Kuadran 4: Rendah Pengaruh, Rendah Kepentingan (Monitor)

#### Quadrant 1: High Influence, High Interest (Manage Closely)

**Quadrant 2: High Influence, Low Interest (Keep Satisfied)

#### Quadrant 2: High Influence, Low Interest (Keep Satisfied)

- **Audit & Quality Officers**: Ensure compliance and obtain formal approval
**Quadrant 3: Low Influence, High Interest (Keep Informed)

- **Tourism Malaysia**: Regular communication about progress and data access

#### Quadrant 3: Low Influence, High Interest (Keep Informed)

- **Homestay Operators**: Basic communication and user support
- **Technology Vendor**: Monitor contract performance and delivery

#### Quadrant 4: Low Influence, Low Interest (Monitor)

- Workshop keperluan dengan MOTAC HQ dan negeri terpilih
- Sesi konsultasi dengan koperasi untuk memahami workflow sedia ada
- Technical briefing dengan pasukan IT untuk keperluan infrastruktur

**Fase Pembangunan (Development Phase):

- Review berkala dengan MOTAC HQ untuk memastikan alignment
- Demo progress kepada pengguna utama untuk dapatkan feedback
- Koordinasi teknikal dengan vendor untuk milestone delivery

**Fase Pelaksanaan (Implementation Phase):

- Latihan intensif untuk semua pengguna mengikut peringkat
- Komunikasi change management kepada semua pihak berkepentingan
- Sokongan go-live dengan helpdesk dan technical support

**Fase Pasca-Pelaksanaan (Post-Implementation Phase):

- Sesi feedback dan lesson learned dengan pengguna utama
- Monitoring prestasi dan kepuasan pengguna
- Perancangan enhancement berdasarkan maklum balas

**Planning Phase:

- Requirements workshop with MOTAC HQ and selected states
- Consultation sessions with cooperatives to understand existing workflow
- Technical briefing with IT team for infrastructure requirements

**Development Phase:

- Regular reviews with MOTAC HQ to ensure alignment
- Progress demos to key users for feedback
- Technical coordination with vendor for milestone delivery

**Implementation Phase:

- Intensive training for all users by level
- Change management communication to all stakeholders
- Go-live support with helpdesk and technical support

**Post-Implementation Phase:

- Feedback and lesson learned sessions with key users
- Performance monitoring and user satisfaction
- Enhancement planning based on feedback

### 4.4 Matriks Komunikasi | Communication Matrix

| Pihak Berkepentingan | Frekuensi Komunikasi | Kaedah Komunikasi | Jenis Maklumat | PIC Komunikasi |
|---------------------|---------------------|-------------------|-----------------|----------------|
| MOTAC HQ | Mingguan | Laporan status, meeting formal | Progress update, isu kritikal, keputusan | Project Manager |
| MOTAC Negeri | Dwi-mingguan | Email update, workshop | Training schedule, progress update | Business Analyst |
| Koperasi Homestay | Bulanan | Newsletter, webinar | System features, training info | Training Coordinator |
| Tourism Malaysia | Bulanan | Email brief, demo session | Data access, analytics features | Data Analyst |
| Pasukan IT | Harian | Stand-up meeting, Slack | Technical progress, blocker resolution | Technical Lead |
| Vendor | Mingguan | Status call, milestone review | Delivery progress, quality metrics | Project Manager |

| Stakeholder | Communication Frequency | Communication Method | Information Type | Communication PIC |
|-------------|------------------------|---------------------|------------------|-------------------|
| MOTAC HQ | Weekly | Status report, formal meeting | Progress update, critical issues, decisions | Project Manager |
| MOTAC States | Bi-weekly | Email update, workshop | Training schedule, progress update | Business Analyst |
| Homestay Cooperatives | Monthly | Newsletter, webinar | System features, training info | Training Coordinator |
| Tourism Malaysia | Monthly | Email brief, demo session | Data access, analytics features | Data Analyst |
| IT Team | Daily | Stand-up meeting, Slack | Technical progress, blocker resolution | Technical Lead |
| Vendor | Weekly | Status call, milestone review | Delivery progress, quality metrics | Project Manager |

---

## 5. Analisis Nilai & Rasional Perniagaan | Business Value & Rationale

Sistem ini dijangka memberi pulangan pelaburan (ROI) yang tinggi kepada MOTAC dan Tourism Malaysia melalui:

- Penjimatan masa pelaporan tahunan sebanyak 200 jam kerja.
- Peningkatan ketepatan data melebihi 95% selepas migrasi.
- Pengurangan beban kerja manual untuk pegawai negeri dan HQ.
- Keputusan strategik lebih pantas dan berasaskan data.

Perbandingan dengan sistem manual:

- Proses pelaporan dipendekkan dari 3 minggu ke 3 hari.
- Risiko kehilangan data dan ralat manual dikurangkan secara signifikan.

This system is expected to deliver high ROI to MOTAC and Tourism Malaysia by:

- Saving 200+ annual reporting hours.
- Improving data accuracy to over 95% post-migration.
- Reducing manual workload for state and HQ officers.
- Enabling faster, data-driven strategic decisions.

Compared to the manual system:

- Reporting time reduced from 3 weeks to 3 days.
- Data loss and manual error risks are significantly reduced.

---

## 6. Asumsi & Kebergantungan Perniagaan | Business Assumptions & Dependencies

- Semua negeri dan koperasi mempunyai akses internet stabil untuk memuat naik data.
- Data Homestay tersedia dan dikemaskini oleh pejabat negeri/koperasi setiap bulan.
- Pengguna utama telah menerima latihan asas ICT.
- Template data Excel telah diseragamkan di seluruh negara.
- Sistem bergantung kepada direktori utama MOTAC dan integrasi dengan Tourism Malaysia Analytics.
- Jadual pelaporan negeri dan HQ selaras dengan keperluan MOTAC.

- All states and cooperatives have stable internet access for data uploads.
- Homestay data is available and updated monthly by state/cooperative offices.
- Key users have basic ICT training.
- Excel data templates are standardized nationwide.
- The system depends on MOTAC master directory and integration with Tourism Malaysia Analytics.
- State and HQ reporting schedules are aligned with MOTAC requirements.

---

## 7. Proses Perniagaan Sedia Ada | Current Business Process

1. Pengumpulan laporan bulanan Homestay secara manual oleh pejabat negeri/koperasi menggunakan Excel.
2. Laporan dihantar ke MOTAC HQ melalui e-mel.
3. Pegawai HQ menyatukan data secara manual, melakukan validasi, dan menyediakan ringkasan nasional.
4. Laporan akhir disediakan untuk pengurusan dan pelaporan rasmi.

**Pain Points:

- Duplikasi data dan format tidak seragam.
- Data hilang atau tidak lengkap.
- Proses validasi dan konsolidasi memakan masa (hingga 3 minggu).
- Sukar untuk analisis trend dan perbandingan antara negeri/koperasi.

1. Manual collection of monthly Homestay reports by state/cooperative offices using Excel.
2. Reports sent to MOTAC HQ via email.
3. HQ officers manually consolidate data, perform validation, and prepare national summary.
4. Final reports prepared for management and official reporting.

**Pain Points:

- Data duplication and non-uniform formats.
- Lost or incomplete data.
- Validation and consolidation process takes time (up to 3 weeks).
- Difficult for trend analysis and comparison between states/cooperatives.

---

## 8. Proses Perniagaan Baharu | To-Be Business Process

1. Pegawai negeri/koperasi memuat naik data Homestay ke sistem secara digital.
2. Sistem melakukan validasi automatik dan menyimpan rekod ke pangkalan data berpusat.
3. Dashboard dan laporan dikemaskini secara automatik untuk semua peringkat (nasional, negeri, koperasi, Homestay).
4. MOTAC HQ dan negeri boleh mengakses analitik dan laporan masa nyata.

**English Version:**

1. State/cooperative officers upload Homestay data to the system digitally.
2. System performs automatic validation and stores records in centralized database.
3. Dashboards and reports are automatically updated for all levels (national, state, cooperative, Homestay).
4. MOTAC HQ and states can access real-time analytics and reports.

---

## 9. Keperluan Fungsi Perniagaan | Functional Business Requirements

### 9.1 Keperluan Import & Validasi Data | Data Import & Validation Requirements

#### BRS-FN-01: Import Data Homestay | Homestay Data Import

#### BRS-FN-02: Validasi Data Automatik | Automatic Data Validation

#### BRS-FN-01: Homestay Data Import

#### BRS-FN-02: Automatic Data Validation

- Data integrity checks to detect duplicates, empty values, or incorrect formats.
- System alerts and notifications for data errors with clear correction guidance.
- Detailed logs for each validation process with timestamp and user tracking.

### 9.2 Keperluan Dashboard & Analitik | Dashboard & Analytics Requirements

#### BRS-FN-03: Dashboard Analitik Multi-Tahap | Multi-Level Analytics Dashboard

#### BRS-FN-04: Visualisasi Data Interaktif | Interactive Data Visualization

#### BRS-FN-03: Multi-Level Analytics Dashboard

#### BRS-FN-04: Interactive Data Visualization

- Interactive Malaysia map with Homestay data layers by state.
- Heat maps for performance and Homestay density visualization.
- Filter and search functions for customized analysis by specific parameters.

### 9.3 Keperluan Pelaporan | Reporting Requirements

#### BRS-FN-05: Penjanaan Laporan Automatik | Automatic Report Generation

#### BRS-FN-06: Eksport Data & Laporan | Data & Report Export

#### BRS-FN-05: Automatic Report Generation

- Standardized report templates according to MOTAC standards.
- Report scheduling with automated delivery via email or portal.
- Ad-hoc reports based on user-selected parameters and filters.

#### BRS-FN-06: Data & Report Export

- Raw data export in Excel, CSV, and PDF formats.
- Charts and visualizations export in image (PNG, JPEG) and PDF formats.
- Bulk export for multiple reports or datasets.
- Export with watermark and metadata for audit trail purposes.

### 9.4 Keperluan Pengurusan Pengguna | User Management Requirements

#### BRS-FN-07: Kawalan Akses Berasaskan Peranan | Role-Based Access Control

- Peranan Admin: Akses penuh kepada semua fungsi sistem, pengurusan pengguna, dan konfigurasi sistem.
- Peranan Penganalisis: Akses kepada dashboard, laporan, dan eksport data tanpa kemampuan edit.
- Peranan Pemerhati: Akses read-only kepada dashboard dan laporan yang diberi kebenaran.
- Peranan Negeri: Akses kepada data dan fungsi yang berkaitan dengan negeri tertentu sahaja.

#### BRS-FN-08: Pengurusan Sesi & Keselamatan | Session & Security Management

- Login menggunakan credentials dengan multi-factor authentication untuk pengguna kritikal.
- Session timeout automatik selepas tempoh inactive untuk keselamatan.
- Password policy dengan complexity requirements dan regular password change.
- Audit trail untuk semua login, logout, dan aktiviti pengguna dalam sistem.

#### BRS-FN-07: Role-Based Access Control

- Admin Role: Full access to all system functions, user management, and system configuration.
- Analyst Role: Access to dashboards, reports, and data export without edit capability.
- Viewer Role: Read-only access to authorized dashboards and reports.
- State Role: Access to data and functions related to specific state only.

#### BRS-FN-08: Session & Security Management

- Login using credentials with multi-factor authentication for critical users.
- Automatic session timeout after inactive period for security.
- Password policy with complexity requirements and regular password change.
- Audit trail for all login, logout, and user activities in the system.

### 9.5 Keperluan Notifikasi & Komunikasi | Notification & Communication Requirements

#### BRS-FN-09: Sistem Notifikasi | Notification System

- Email notifications untuk laporan siap, ralat data, atau deadline reminder.
- In-app notifications untuk system maintenance, updates, atau announcement.
- SMS notifications untuk critical alerts kepada pengguna kritikal.
- Customizable notification preferences untuk setiap pengguna.

#### BRS-FN-10: Penjadualan & Automasi | Scheduling & Automation

- Automated scheduling untuk laporan bulanan, quarterly, dan tahunan.
- Reminder alerts kepada pengguna untuk deadline submission data.
- Automated backup dan archive data mengikut schedule yang ditetapkan.
- System health monitoring dengan automated alerts untuk technical issues.

#### BRS-FN-09: Notification System

- Email notifications for completed reports, data errors, or deadline reminders.
- In-app notifications for system maintenance, updates, or announcements.
- SMS notifications for critical alerts to critical users.
- Customizable notification preferences for each user.

#### BRS-FN-10: Scheduling & Automation

- Automated scheduling for monthly, quarterly, and annual reports.
- Reminder alerts to users for data submission deadlines.
- Automated backup and data archiving according to set schedule.
- System health monitoring with automated alerts for technical issues.

### 9.6 Matriks Traceability Keperluan | Requirements Traceability Matrix

| ID Keperluan BRS | Objektif Perniagaan | Stakeholder Utama | Kriteria Kejayaan | Keutamaan |
|------------------|--------------------|--------------------|-------------------|-----------|
| BRS-FN-01 | OO-01, OO-02 | MOTAC Negeri, Koperasi | Import 10,000+ rekod <5 minit | Tinggi |
| BRS-FN-02 | OO-02 | MOTAC HQ, Negeri | 95% ketepatan data | Tinggi |
| BRS-FN-03 | OS-01, OS-02 | MOTAC HQ, Tourism Malaysia | 4 level dashboard aktif | Tinggi |
| BRS-FN-04 | OS-01, OS-03 | Semua pengguna | Visualisasi interaktif | Sederhana |
| BRS-FN-05 | OO-01 | MOTAC HQ, Negeri | Laporan automatik tepat masa | Tinggi |
| BRS-FN-06 | OS-01 | Semua pengguna | Eksport pelbagai format | Sederhana |
| BRS-FN-07 | OS-01 | MOTAC HQ | RBAC untuk semua pengguna | Tinggi |
| BRS-FN-08 | Pematuhan | MOTAC HQ, Audit | Audit trail lengkap | Tinggi |
| BRS-FN-09 | OO-03 | Semua pengguna | Notifikasi tepat masa | Sederhana |
| BRS-FN-10 | OO-01 | MOTAC HQ | Automasi 90% laporan | Sederhana |

| BRS Requirement ID | Business Objective | Primary Stakeholder | Success Criteria | Priority |
|--------------------|--------------------|--------------------|------------------|----------|
| BRS-FN-01 | OO-01, OO-02 | MOTAC States, Cooperatives | Import 10,000+ records <5 min | High |
| BRS-FN-02 | OO-02 | MOTAC HQ, States | 95% data accuracy | High |
| BRS-FN-03 | OS-01, OS-02 | MOTAC HQ, Tourism Malaysia | 4 level dashboard active | High |
| BRS-FN-04 | OS-01, OS-03 | All users | Interactive visualization | Medium |
| BRS-FN-05 | OO-01 | MOTAC HQ, States | Automatic reports on time | High |
| BRS-FN-06 | OS-01 | All users | Multi-format export | Medium |
| BRS-FN-07 | OS-01 | MOTAC HQ | RBAC for all users | High |
| BRS-FN-08 | Compliance | MOTAC HQ, Audit | Complete audit trail | High |
| BRS-FN-09 | OO-03 | All users | Timely notifications | Medium |
| BRS-FN-10 | OO-01 | MOTAC HQ | 90% report automation | Medium |

---

## 10. Keperluan Bukan Fungsi | Non-Functional Business Requirements

### 10.1 Prestasi & Skalabiliti | Performance & Scalability

#### BRS-NF-01: Prestasi Sistem | System Performance

- Proses import dan analitik untuk 10,000+ rekod dalam masa <5 minit.
- Masa respons dashboard <3 saat untuk semua operasi standard.
- Masa loading laporan <10 saat untuk dataset standard (~1,000 rekod).
- Concurrent user support: sehingga 100 pengguna aktif serentak tanpa degradasi prestasi.

#### BRS-NF-02: Skalabiliti | Scalability

- Sistem mampu menguruskan pertumbuhan data 20% setahun untuk 5 tahun akan datang.
- Database architecture yang menyokong horizontal scaling.
- Cloud infrastructure yang boleh scale up/down berdasarkan usage pattern.
- API design yang membolehkan integration dengan sistem tambahan pada masa hadapan.

#### BRS-NF-01: System Performance

- Import and analytics processing for 10,000+ records within <5 minutes.
- Dashboard response time <3 seconds for all standard operations.
- Report loading time <10 seconds for standard dataset (~1,000 records).
- Concurrent user support: up to 100 active users simultaneously without performance degradation.

#### BRS-NF-02: Scalability

- System can handle 20% annual data growth for the next 5 years.
- Database architecture supporting horizontal scaling.
- Cloud infrastructure that can scale up/down based on usage pattern.
- API design enabling integration with additional systems in the future.

### 10.2 Ketersediaan & Kebolehpercayaan | Availability & Reliability

#### BRS-NF-03: Ketersediaan Sistem | System Availability

- 99.5% uptime untuk akses kritikal MOTAC HQ (24/7).
- 99% uptime untuk pengguna negeri dan koperasi (8AM-8PM, Mon-Fri).
- Scheduled maintenance window: Ahad 12AM-6AM dengan advance notice.
- Disaster recovery capability dengan RTO (Recovery Time Objective) <4 jam.

#### BRS-NF-04: Backup & Pemulihan | Backup & Recovery

- Daily automated backup untuk semua data kritikal.
- Point-in-time recovery capability untuk data restoration.
- Geo-redundant backup storage untuk disaster recovery.
- Backup retention policy: 30 hari daily, 12 bulan monthly, 7 tahun yearly.

#### BRS-NF-03: System Availability

- 99.5% uptime for critical MOTAC HQ access (24/7).
- 99% uptime for state and cooperative users (8AM-8PM, Mon-Fri).
- Scheduled maintenance window: Sunday 12AM-6AM with advance notice.
- Disaster recovery capability with RTO (Recovery Time Objective) <4 hours.

#### BRS-NF-04: Backup & Recovery

- Daily automated backup for all critical data.
- Point-in-time recovery capability for data restoration.
- Geo-redundant backup storage for disaster recovery.
- Backup retention policy: 30 days daily, 12 months monthly, 7 years yearly.

### 10.3 Keselamatan & Pematuhan | Security & Compliance

#### BRS-NF-05: Keselamatan Data | Data Security

- Encryption-at-rest untuk semua data sensitif menggunakan AES-256.
- Encryption-in-transit menggunakan TLS 1.3 untuk semua komunikasi.
- Patuh kepada MyGOV ICT Security Policy dan PDPA 2010.
- Multi-factor authentication untuk pengguna kritikal (Admin, HQ).

#### BRS-NF-06: Audit & Pematuhan | Audit & Compliance

- Comprehensive audit trail untuk semua user actions dan data changes.
- Retention audit logs minimum 7 tahun mengikut keperluan MOTAC.
- Automated compliance checking dan reporting untuk internal audit.
- Integration dengan MOTAC existing identity management system.

#### BRS-NF-05: Data Security

- Encryption-at-rest for all sensitive data using AES-256.
- Encryption-in-transit using TLS 1.3 for all communications.
- Compliance with MyGOV ICT Security Policy and PDPA 2010.
- Multi-factor authentication for critical users (Admin, HQ).

#### BRS-NF-06: Audit & Compliance

- Comprehensive audit trail for all user actions and data changes.
- Audit log retention minimum 7 years according to MOTAC requirements.
- Automated compliance checking and reporting for internal audit.
- Integration with MOTAC existing identity management system.

### 10.4 Kebolehgunaan & Pengalaman Pengguna | Usability & User Experience

#### BRS-NF-07: Antaramuka Pengguna | User Interface

- Sistem web responsif yang compatible dengan desktop, tablet, dan mobile.
- Sokongan browser: Chrome, Firefox, Safari, Edge (versi terkini).
- Bilingual interface (Bahasa Malaysia/English) dengan easy language switching.
- Intuitive navigation dengan maksimum 3 clicks untuk mencapai mana-mana fungsi.

#### BRS-NF-08: Kemudahan Penggunaan | Ease of Use

- Self-explanatory interface yang memerlukan latihan minimum.
- Context-sensitive help dan tooltips untuk guidance pengguna.
- Error messages yang jelas dengan suggested actions untuk resolution.
- Drag-and-drop file upload dengan clear progress indicators.

#### BRS-NF-07: User Interface

- Responsive web system compatible with desktop, tablet, and mobile.
- Browser support: Chrome, Firefox, Safari, Edge (latest versions).
- Bilingual interface (Bahasa Malaysia/English) with easy language switching.
- Intuitive navigation with maximum 3 clicks to reach any function.

#### BRS-NF-08: Ease of Use

- Self-explanatory interface requiring minimum training.
- Context-sensitive help and tooltips for user guidance.
- Clear error messages with suggested actions for resolution.
- Drag-and-drop file upload with clear progress indicators.

### 10.5 Integrasi & Interoperabiliti | Integration & Interoperability

#### BRS-NF-09: Integrasi Sistem | System Integration

- RESTful API untuk integration dengan Tourism Malaysia systems.
- LDAP/Active Directory integration untuk single sign-on capability.
- Export API untuk third-party analytics tools dan reporting systems.
- Webhook support untuk real-time notifications kepada external systems.

#### BRS-NF-10: Standard & Protokol | Standards & Protocols

- JSON format untuk data exchange mengikut industry standard.
- OAuth 2.0 untuk secure API authentication dan authorization.
- HTTPS only communication dengan proper SSL certificate management.
- Standard SQL database untuk ensure data portability dan vendor independence.

#### BRS-NF-09: System Integration

- RESTful API for integration with Tourism Malaysia systems.
- LDAP/Active Directory integration for single sign-on capability.
- Export API for third-party analytics tools and reporting systems.
- Webhook support for real-time notifications to external systems.

#### BRS-NF-10: Standards & Protocols

- JSON format for data exchange according to industry standards.
- OAuth 2.0 for secure API authentication and authorization.
- HTTPS only communication with proper SSL certificate management.
- Standard SQL database to ensure data portability and vendor independence.

### 10.6 Sokongan & Penyelenggaraan | Support & Maintenance

#### BRS-NF-11: Sokongan Pengguna | User Support

- 8AM-6PM helpdesk support (Mon-Fri) dalam Bahasa Malaysia dan English.
- Online help documentation dan video tutorials.
- Ticket-based support system dengan SLA response time <4 jam.
- Remote training capability dan screen sharing untuk troubleshooting.

#### BRS-NF-12: Penyelenggaraan Sistem | System Maintenance

- Automated system monitoring dengan proactive alerts.
- Monthly system health reports dan performance analytics.
- Quarterly system updates dan security patches.
- Annual system review dan capacity planning assessment.

#### BRS-NF-11: User Support

- 8AM-6PM helpdesk support (Mon-Fri) in Bahasa Malaysia and English.
- Online help documentation and video tutorials.
- Ticket-based support system with SLA response time <4 hours.
- Remote training capability and screen sharing for troubleshooting.

#### BRS-NF-12: System Maintenance

- Automated system monitoring with proactive alerts.
- Monthly system health reports and performance analytics.
- Quarterly system updates and security patches.
- Annual system review and capacity planning assessment.

---

## 11. Keperluan Pelaporan | Reporting & Analytics Requirements

- Laporan prestasi mengikut negeri, koperasi, dan nasional.
- Metrik utama: jumlah pelawat, pendapatan, kadar penghunian, kapasiti, penembusan koperasi.
- Dashboard analitik dengan visual interaktif (carta, graf, peta, jadual).
- Eksport laporan ke format Excel dan PDF.

- Performance reports by state, cooperative, and national levels.
- Key metrics: visitor numbers, revenue, occupancy rate, capacity, cooperative penetration.
- Analytics dashboard with interactive visuals (charts, graphs, maps, tables).
- Export reports to Excel and PDF formats.

---

---

## BAHAGIAN E: KRITERIA KEJAYAAN & METRIK | SECTION E: SUCCESS CRITERIA & METRICS

## 12. Kriteria Kejayaan Perniagaan | Business Success Criteria

- Sistem mampu menghasilkan laporan negeri dan nasional secara automatik tanpa input manual.
- Masa pengumpulan data bulanan berkurang dari 3 minggu kepada 3 hari.
- Ketepatan data melebihi 95% selepas migrasi.
- Semua pengguna utama dapat mengakses dashboard dan laporan mengikut peranan.

- System can generate state and national reports automatically without manual input.
- Monthly data collection time reduced from 3 weeks to 3 days.
- Data accuracy exceeds 95% after migration.
- All key users can access dashboards and reports according to their roles.

---

## 13. Anggaran Faedah | Expected Business Benefits

- Penjimatan masa pelaporan tahunan sebanyak 200 jam kerja.
- Peningkatan ketepatan data melebihi 95% selepas migrasi.
- Pengurangan beban kerja manual untuk pegawai negeri dan HQ.
- Keputusan strategik lebih pantas dan berasaskan data.

- Annual reporting time savings of 200 work hours.
- Data accuracy improvement to over 95% after migration.
- Reduced manual workload for state and HQ officers.
- Faster, data-driven strategic decisions.

---

## 14. Kriteria Penerimaan Perniagaan | Business Acceptance Criteria

- Semua negeri berjaya memuat naik dan mengesahkan data bulanan dalam tempoh 3 hari selepas tarikh akhir pelaporan.
- Dashboard dan laporan utama menunjukkan ketepatan ≥ 95% berbanding data sumber.
- Semua pengguna utama (HQ, negeri, koperasi) dapat mengakses sistem dan menjalankan fungsi mengikut peranan.
- Semua laporan utama boleh dieksport ke Excel/PDF tanpa ralat.
- UAT dan sign-off rasmi oleh MOTAC HQ dan negeri diperoleh.

- All states successfully upload and validate monthly data within 3 days of the reporting deadline.
- Main dashboards and reports show ≥ 95% accuracy compared to source data.
- All key users (HQ, state, cooperative) can access the system and perform role-based functions.
- All main reports can be exported to Excel/PDF without errors.
- UAT and official sign-off by MOTAC HQ and states are obtained.

---

## 15. Pelan Pengurusan Perubahan Perniagaan | Business Change Management Plan

- Peralihan daripada pelaporan manual Excel kepada sistem digital akan dilaksanakan secara berperingkat:
  - Minggu 1–2: Latihan pengguna negeri dan koperasi.
  - Minggu 3–4: Ujian rintis (pilot) di 2 negeri terpilih.
  - Minggu 5–6: Pelaksanaan penuh di seluruh negara.
- Komunikasi perubahan melalui e-mel rasmi, webinar, dan sesi Q&A.
- Pasukan sokongan disediakan untuk membantu pengguna sepanjang tempoh peralihan.

- Transition from manual Excel reporting to digital system will be phased:
  - Weeks 1–2: Training for state and cooperative users.
  - Weeks 3–4: Pilot testing in 2 selected states.
  - Weeks 5–6: Full rollout nationwide.
- Change communication via official email, webinars, and Q&A sessions.
- Support team available to assist users during the transition period.

---

## 16. Keperluan Pemantauan & Penilaian Prestasi | Performance Monitoring Requirements

- Bilangan laporan negeri dan nasional yang dijana secara automatik setiap bulan.
- Masa purata pengumpulan dan pemprosesan data bulanan (sasaran: <3 hari).
- Ketepatan data selepas migrasi dan validasi (sasaran: ≥95%).
- Kadar penggunaan sistem oleh negeri/koperasi (adoption rate).
- Bilangan insiden data tidak lengkap atau ralat pelaporan.

- Number of state and national reports generated automatically each month.
- Average time for monthly data collection and processing (target: <3 days).
- Data accuracy after migration and validation (target: ≥95%).
- System adoption rate by states/cooperatives.
- Number of incomplete data incidents or reporting errors.

---

## 17. Risiko & Andaian Perniagaan | Business Risks & Assumptions

| Risiko / Risk | Impak / Impact | Pemilik / Owner | Mitigasi / Mitigation |
|---------------|----------------|-----------------|----------------------|
| Penentangan pengguna (user resistance) | Tinggi | MOTAC HQ/Negeri | Latihan intensif, komunikasi jelas |
| Kegagalan sistem (downtime) | Tinggi | Vendor/DevOps | Pemantauan 24/7, pelan pemulihan |
| Data tidak tepat/ralat upload | Tinggi | Negeri/Koperasi | Validasi automatik, notifikasi ralat |
| Kelewatan koordinasi negeri | Sederhana | MOTAC Negeri | Jadual tetap, pemantauan kemajuan |
| Kekurangan latihan | Sederhana | MOTAC HQ | Program latihan berstruktur |
| Isu keselamatan data | Tinggi | Vendor/DevOps | Audit berkala, pematuhan piawaian |

---

## 18. Pelan Latihan & Penerimaan | Training & Adoption Plan

- Sesi latihan hands-on untuk semua pengguna negeri, koperasi, dan HQ.
- Format: Bengkel fizikal, webinar, video tutorial, dan manual pengguna.
- Tempoh latihan: 2 minggu sebelum pelaksanaan penuh.
- KPI penerimaan: ≥90% pengguna berjaya log masuk dan memuat naik data dalam bulan pertama.
- Sesi Q&A dan sokongan pasca-latihan selama 1 bulan.

- Hands-on training sessions for all state, cooperative, and HQ users.
- Format: Physical workshops, webinars, video tutorials, and user manuals.
- Training duration: 2 weeks before full rollout.
- Adoption KPI: ≥90% of users successfully log in and upload data in the first month.
- Q&A sessions and post-training support for 1 month.

---

## 19. Keperluan Keselamatan & Pematuhan | Compliance & Data Governance

- Sistem mematuhi MyGOV ICT Security Policy, Akta Perlindungan Data Peribadi 2010 (PDPA), dan dasar pengelasan data MOTAC.
- Semua data pengguna dan laporan disimpan secara selamat dengan kawalan akses berasaskan peranan.
- Tempoh penyimpanan data minimum 7 tahun atau mengikut dasar MOTAC.
- Audit trail/log perubahan data disimpan untuk tujuan pematuhan dan audit.

- The system complies with MyGOV ICT Security Policy, Personal Data Protection Act 2010 (PDPA), and MOTAC data classification policy.
- All user and report data is securely stored with role-based access control.
- Minimum data retention period is 7 years or as per MOTAC policy.
- Audit trail/data change logs are maintained for compliance and audit purposes.

---

## 20. Keperluan Skalabiliti & Pengembangan Masa Depan | Future Scalability & Business Expansion Needs

- Sistem direka untuk menyokong penambahan kategori data baharu (demografi pelawat, ekopelancongan, inap desa luar bandar).
- Perancangan jangka panjang: integrasi dengan sistem analitik pelancongan nasional, predictive analytics, dan pelaporan masa nyata.
- Sokongan API terbuka untuk integrasi dengan sistem pihak ketiga.

- The system is designed to support new data categories (visitor demographics, eco-tourism, rural stays).
- Long-term plan: integration with national tourism analytics, predictive analytics, and real-time reporting.
- Open API support for third-party system integration.

---

## 21. Garis Masa & Fasa Pelaksanaan | Project Timeline & Phases

| Fasa | Aktiviti Utama | Tempoh |
|------|----------------|--------|
| Fasa 1 | Migrasi & validasi data | 2 minggu |
| Fasa 2 | Pembangunan dashboard & analitik | 4 minggu |
| Fasa 3 | Pengurusan pengguna & pelaporan | 3 minggu |
| Fasa 4 | UAT & deployment | 2 minggu |

| Phase | Main Activities | Duration |
|-------|----------------|----------|
| Phase 1 | Data migration & validation | 2 weeks |
| Phase 2 | Dashboard & analytics development | 4 weeks |
| Phase 3 | User management & reporting | 3 weeks |
| Phase 4 | UAT & deployment | 2 weeks |

---

## 22. Lampiran Tambahan | Supporting Documents

- D01 System Development Plan (SDP)
- D03 System Requirements Specification (SRS)
- D04 System Design Document (SDD)
- D05 Data Migration Plan
- D07 System Integration Plan
- Semua dokumen rujukan utama disimpan dalam folder `/docs/` projek.

- D01 System Development Plan (SDP)
- D03 System Requirements Specification (SRS)
- D04 System Design Document (SDD)
- D05 Data Migration Plan
- D07 System Integration Plan

---

## 23. Terminologi & Definisi | Glossary of Terms

| Istilah (BM) | Term (EN) | Definisi / Definition |
|--------------|-----------|----------------------|
| Homestay | Homestay | Penginapan berdaftar di bawah program rasmi MOTAC / Registered accommodation under MOTAC official program |
| Koperasi | Cooperative | Entiti pengurusan Homestay di peringkat negeri/daerah / Homestay management entity at state/district level |
| Kluster | Cluster | Kumpulan Homestay di bawah satu pengurusan / Group of Homestays under one management |
| Dashboard | Dashboard | Paparan visual interaktif untuk analitik dan pelaporan / Interactive visual display for analytics and reporting |
| Prestasi | Performance | Ukuran pencapaian Homestay (pelawat, pendapatan, dsb.) / Homestay achievement metrics (visitors, revenue, etc.) |
| UAT | UAT | Ujian Penerimaan Pengguna / User Acceptance Testing |
| Admin | Admin | Pengguna dengan akses penuh sistem / User with full system access |
| Penganalisis | Analyst | Pengguna dengan akses analitik & eksport / User with analytics & export access |
| Pemerhati | Viewer | Pengguna dengan akses bacaan sahaja / User with read-only access |
| Pelaporan | Reporting | Proses penjanaan laporan prestasi / The process of generating performance reports |
| Audit Trail | Audit Trail | Rekod perubahan data & aktiviti pengguna / Record of data changes & user activity |
| Data Migration | Migrasi Data | Proses pemindahan data dari sistem lama ke sistem baharu / Process of transferring data from old to new system |

---

## 24. Jejak Dokumen & Kawalan Versi | Document Traceability & Version Control

**Keterkaitan Dokumen / Document Relationships:

- Dokumen ini berkait rapat dengan:
  - D01 System Development Plan (SDP)
  - D03 System Requirements Specification (SRS)
  - D04 System Design Document (SDD)
  - D05 Data Migration Plan
  - D07 System Integration Plan

- This document is closely linked to:
  - D01 System Development Plan (SDP)
  - D03 System Requirements Specification (SRS)
  - D04 System Design Document (SDD)
  - D05 Data Migration Plan
  - D07 System Integration Plan

**Matriks Jejak Keperluan / Requirements Traceability Matrix:

| BRS Requirement | SRS Reference | Catatan / Notes |
|-----------------|--------------|-----------------|
| BRS-FN-01 | SRS-FN-01 | Import data Homestay |
| BRS-FN-02 | SRS-FN-02 | Dashboard analitik |
| BRS-FN-03 | SRS-FN-03 | Drill-down & penapisan |
| BRS-FN-04 | SRS-FN-04 | Laporan & eksport |
| BRS-FN-05 | SRS-FN-05 | Pengurusan pengguna |
| BRS-FN-06 | SRS-FN-06 | Penjadualan laporan |

| BRS Requirement | SRS Reference | Notes |
|-----------------|--------------|-------|
| BRS-FN-01 | SRS-FN-01 | Homestay data import |
| BRS-FN-02 | SRS-FN-02 | Analytics dashboard |
| BRS-FN-03 | SRS-FN-03 | Drill-down & filtering |
| BRS-FN-04 | SRS-FN-04 | Reporting & export |
| BRS-FN-05 | SRS-FN-05 | User management |
| BRS-FN-06 | SRS-FN-06 | Report scheduling |

---

## Lampiran | Appendices

### Lampiran A: Anggaran ROI | ROI Estimates

- Penjimatan kos operasi tahunan: RM 50,000 (200 jam x RM 250/jam)
- Kos pembangunan sistem: RM 200,000
- Tempoh pulangan modal: 4 tahun
- Annual operational cost savings: RM 50,000 (200 hours x RM 250/hour)
- System development cost: RM 200,000
- Payback period: 4 years

### Lampiran B: Piawai Keselamatan | Security Standards

- Rujuk kepada MyGOV ICT Security Framework
- PDPA 2010 compliance requirements
- MOTAC data classification guidelines
- Refer to MyGOV ICT Security Framework
- PDPA 2010 compliance requirements
- MOTAC data classification guidelines

---

**Dokumen Selesai | Document Complete

*Versi: 3.0*  
*Tarikh Kemaskini: 11 Oktober 2025*  
*Disediakan oleh: Pasukan Pembangunan Sistem*  
*Disemak oleh: MOTAC HQ*

*Version: 3.0*  
*Last Updated: 11 October 2025*  
*Prepared by: System Development Team*  
*Reviewed by: MOTAC HQ*
