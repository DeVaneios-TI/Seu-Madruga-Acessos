<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Madruga Acesso - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #0f172a; color: #f8fafc; }
        .glass { background: rgba(30, 41, 59, 0.7); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.1); }
        .accent-gradient { background: linear-gradient(135deg, #38bdf8 0%, #818cf8 100%); }
        .card-hover:hover { transform: translateY(-4px); transition: all 0.3s ease; border-color: rgba(56, 189, 248, 0.4); }
    </style>
</head>
<body class="min-h-screen">
    <!-- Sidebar / Header -->
    <nav class="glass sticky top-0 z-50 px-6 py-4 border-b border-white/10 flex justify-between items-center">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl accent-gradient flex items-center justify-center text-white shadow-lg shadow-sky-500/20">
                <i class="fas fa-key text-lg"></i>
            </div>
            <div>
                <h1 class="text-xl font-bold tracking-tight">Madruga<span class="text-sky-400">Acesso</span></h1>
                <p class="text-xs text-slate-400 uppercase tracking-widest font-semibold">Portaria Inteligente</p>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <button class="p-2 text-slate-400 hover:text-white transition-colors"><i class="fas fa-bell"></i></button>
            <div class="h-8 w-[1px] bg-white/10 mx-2"></div>
            <div class="flex items-center gap-3">
                <span class="text-sm font-medium">Administrador</span>
                <img src="{{ asset('img/icon.jpg') }}" alt="User" class="w-10 h-10 rounded-full border-2 border-sky-500/30">
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto p-6 md:p-8">
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
            <div class="glass p-6 rounded-3xl card-hover">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-2xl bg-sky-500/10 flex items-center justify-center text-sky-400">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <span class="text-xs font-bold text-emerald-400 bg-emerald-400/10 px-2 py-1 rounded-lg">+12%</span>
                </div>
                <h3 class="text-slate-400 text-sm font-medium">Total Moradores</h3>
                <p class="text-3xl font-bold mt-1" id="total-tenants">0</p>
            </div>
            <div class="glass p-6 rounded-3xl card-hover">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-500/10 flex items-center justify-center text-indigo-400">
                        <i class="fas fa-door-open text-xl"></i>
                    </div>
                    <span class="text-xs font-bold text-emerald-400 bg-emerald-400/10 px-2 py-1 rounded-lg">Ativo</span>
                </div>
                <h3 class="text-slate-400 text-sm font-medium">Acessos Hoje</h3>
                <p class="text-3xl font-bold mt-1" id="total-accesses">0</p>
            </div>
            <div class="glass p-6 rounded-3xl card-hover">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-2xl bg-amber-500/10 flex items-center justify-center text-amber-400">
                        <i class="fas fa-exclamation-triangle text-xl"></i>
                    </div>
                    <span class="text-xs font-bold text-slate-400 bg-white/5 px-2 py-1 rounded-lg">0 Hoje</span>
                </div>
                <h3 class="text-slate-400 text-sm font-medium">Alertas</h3>
                <p class="text-3xl font-bold mt-1">0</p>
            </div>
            <div class="glass p-6 rounded-3xl card-hover">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 flex items-center justify-center text-emerald-400">
                        <i class="fas fa-signal text-xl"></i>
                    </div>
                    <span class="text-xs font-bold text-emerald-400">99.9%</span>
                </div>
                <h3 class="text-slate-400 text-sm font-medium">Uptime Sistema</h3>
                <p class="text-3xl font-bold mt-1">100%</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Recent Access Logs -->
            <div class="lg:col-span-2 space-y-6">
                <div class="flex justify-between items-center px-2">
                    <h2 class="text-xl font-bold">Últimos Acessos</h2>
                    <button class="text-sm text-sky-400 hover:text-sky-300 font-medium">Ver todos</button>
                </div>
                <div class="glass rounded-3xl overflow-hidden">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b border-white/5 text-slate-400 text-xs uppercase tracking-wider">
                                <th class="px-6 py-4 font-semibold">Morador</th>
                                <th class="px-6 py-4 font-semibold">Local</th>
                                <th class="px-6 py-4 font-semibold">Tipo</th>
                                <th class="px-6 py-4 font-semibold">Horário</th>
                            </tr>
                        </thead>
                        <tbody id="access-logs-table" class="divide-y divide-white/5">
                            <!-- JS Injection -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tenants List -->
            <div class="space-y-6">
                <!-- Resident Self-Access Panel -->
                <div class="glass p-6 rounded-3xl border-sky-500/20 shadow-lg shadow-sky-500/5">
                    <h2 class="text-xl font-bold mb-4 flex items-center gap-2">
                        <i class="fas fa-id-card text-sky-400"></i>
                        Acesso Rápido
                    </h2>
                    <div class="space-y-4">
                        <div>
                            <label class="text-xs text-slate-400 uppercase font-bold mb-2 block">Selecionar Morador</label>
                            <select id="resident-select" class="w-full bg-slate-800 border border-white/10 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500/50 appearance-none">
                                <option value="">Carregando moradores...</option>
                            </select>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <button onclick="registerAccess('in')" class="accent-gradient p-3 rounded-xl font-bold text-sm shadow-lg shadow-sky-500/20 hover:opacity-90 transition-opacity">
                                <i class="fas fa-sign-in-alt mr-2"></i> ENTRADA
                            </button>
                            <button onclick="registerAccess('out')" class="bg-rose-500 p-3 rounded-xl font-bold text-sm shadow-lg shadow-rose-500/20 hover:bg-rose-400 transition-colors">
                                <i class="fas fa-sign-out-alt mr-2"></i> SAÍDA
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between items-center px-2">
                    <h2 class="text-xl font-bold">Moradores Ativos</h2>
                    <button onclick="openModal()" class="w-8 h-8 rounded-full bg-sky-500 flex items-center justify-center text-white hover:bg-sky-400 transition-colors">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <div class="space-y-3" id="tenants-list">
                    <!-- JS Injection -->
                </div>
            </div>
        </div>
    </main>

    <!-- Modal de Cadastro -->
    <div id="register-modal" class="fixed inset-0 z-[100] hidden flex items-center justify-center px-4">
        <div class="absolute inset-0 bg-slate-950/80 backdrop-blur-sm" onclick="closeModal()"></div>
        <div class="glass w-full max-w-md p-8 rounded-3xl relative z-10 shadow-2xl border-white/10">
            <h2 class="text-2xl font-bold mb-6 flex items-center gap-2">
                <i class="fas fa-user-plus text-sky-400"></i>
                Novo Morador
            </h2>
            <form id="register-form" class="space-y-5">
                <div>
                    <label class="text-xs text-slate-400 uppercase font-bold mb-2 block">Nome Completo</label>
                    <input type="text" id="reg-name" required placeholder="Ex: João Silva" class="w-full bg-slate-800 border border-white/10 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500/50">
                </div>
                <div>
                    <label class="text-xs text-slate-400 uppercase font-bold mb-2 block">Número do Apartamento</label>
                    <input type="text" id="reg-apt" required placeholder="Ex: 101" class="w-full bg-slate-800 border border-white/10 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-sky-500/50">
                </div>
                <div class="flex gap-3 pt-2">
                    <button type="button" onclick="closeModal()" class="flex-1 bg-white/5 hover:bg-white/10 p-3 rounded-xl font-bold text-sm transition-colors">CANCELAR</button>
                    <button type="submit" class="flex-1 accent-gradient p-3 rounded-xl font-bold text-sm shadow-lg shadow-sky-500/20 hover:opacity-90 transition-opacity">CADASTRAR</button>
                </div>
            </form>
        </div>
    </div>
        </div>
    </main>

    <script>
        function openModal() {
            document.getElementById('register-modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('register-modal').classList.add('hidden');
            document.getElementById('register-form').reset();
        }

        document.getElementById('register-form').addEventListener('submit', async (e) => {
            e.preventDefault();
            const name = document.getElementById('reg-name').value;
            const apartment = document.getElementById('reg-apt').value;

            try {
                const response = await fetch('/api/tenants', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ name, apartment })
                });

                if (response.ok) {
                    closeModal();
                    fetchData();
                    alert('Morador cadastrado com sucesso!');
                } else {
                    const error = await response.json();
                    alert('Erro ao cadastrar: ' + (error.message || 'Dados inválidos'));
                }
            } catch (error) {
                alert('Erro de conexão.');
            }
        });

        async function deleteTenant(id) {
            if (!confirm('Deseja realmente remover este morador?')) return;

            try {
                const response = await fetch(`/api/tenants/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                if (response.ok) {
                    fetchData();
                } else {
                    alert('Erro ao excluir morador.');
                }
            } catch (error) {
                alert('Erro de conexão.');
            }
        }

        async function fetchData() {
            try {
                const [tenantsRes, logsRes] = await Promise.all([
                    fetch('/api/tenants'),
                    fetch('/api/access-logs')
                ]);

                const tenants = await tenantsRes.json();
                const logs = await logsRes.json();

                updateDashboard(tenants, logs);
            } catch (error) {
                console.error('Erro ao buscar dados:', error);
            }
        }

        function updateDashboard(tenants, logs) {
            // Update stats
            document.getElementById('total-tenants').innerText = tenants.length;
            document.getElementById('total-accesses').innerText = logs.length;

            // Update Resident Select
            const select = document.getElementById('resident-select');
            const currentValue = select.value;
            select.innerHTML = '<option value="">Escolha seu nome...</option>' + 
                tenants.map(t => `<option value="${t.id}" ${t.id == currentValue ? 'selected' : ''}>${t.name} (Apto ${t.apartment})</option>`).join('');

            // Update Logs Table
            const logsTable = document.getElementById('access-logs-table');
            logsTable.innerHTML = logs.slice(0, 10).map(log => `
                <tr class="hover:bg-white/5 transition-colors group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-slate-700 flex items-center justify-center text-xs font-bold text-sky-400">
                                ${log.tenant.name.split(' ').map(n => n[0]).join('')}
                            </div>
                            <span class="font-medium text-sm">${log.tenant.name}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-slate-300">${log.device_name}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase ${log.direction === 'in' ? 'bg-emerald-500/10 text-emerald-400' : 'bg-rose-500/10 text-rose-400'}">
                            ${log.direction === 'in' ? 'Entrada' : 'Saída'}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-xs text-slate-400">
                        ${new Date(log.access_time).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}
                    </td>
                </tr>
            `).join('');

            // Update Tenants List
            const tenantsList = document.getElementById('tenants-list');
            tenantsList.innerHTML = tenants.slice(0, 8).map(tenant => `
                <div class="glass p-4 rounded-2xl flex items-center justify-between card-hover group">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-slate-700 flex items-center justify-center text-sm font-bold text-sky-400">
                            ${tenant.name.split(' ').map(n => n[0]).join('')}
                        </div>
                        <div>
                            <p class="font-bold text-sm">${tenant.name}</p>
                            <p class="text-xs text-slate-400">Apto ${tenant.apartment}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <button onclick="deleteTenant(${tenant.id})" class="w-8 h-8 rounded-lg bg-rose-500/10 text-rose-500 opacity-0 group-hover:opacity-100 transition-opacity hover:bg-rose-500 hover:text-white">
                            <i class="fas fa-trash-alt text-xs"></i>
                        </button>
                    </div>
                </div>
            `).join('');
            
            if (tenants.length === 0) {
                tenantsList.innerHTML = '<div class="text-center py-8 text-slate-500 text-sm italic">Nenhum morador cadastrado.</div>';
            }
        }

        async function registerAccess(direction) {
            const tenantId = document.getElementById('resident-select').value;
            if (!tenantId) {
                alert('Por favor, selecione seu nome primeiro.');
                return;
            }

            try {
                const response = await fetch('/api/access-logs', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        tenant_id: tenantId,
                        direction: direction,
                        device_name: 'Terminal Totem'
                    })
                });

                if (response.ok) {
                    // Success feedback
                    fetchData(); // Refresh dashboard
                    alert(`Acesso de ${direction === 'in' ? 'entrada' : 'saída'} registrado com sucesso!`);
                } else {
                    const error = await response.json();
                    alert('Erro ao registrar acesso: ' + (error.message || 'Erro desconhecido'));
                }
            } catch (error) {
                console.error('Erro na requisição:', error);
                alert('Erro de conexão com o servidor.');
            }
        }

        // Initial fetch
        fetchData();
        // Refresh every 30s
        setInterval(fetchData, 30000);
    </script>
</body>
</html>